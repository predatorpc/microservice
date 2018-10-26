<?php

/*
 * Модуль по управлению процесом - процесса принятия сообщений
 * демонизация в бэкграунде + килл + просмотр процессов
 * Michael S. Merzlyakov AFKA predator_pc@17102018
 *
 * fx & ftch @24102018
 *
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Process\Process;
use App\Entity\DaemonManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\HttpFoundation\Request;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;


class ServiceController extends Controller //AbstractController
{
    /**
     * @Route("/service/consumer")
     */

    //Запуск нового форка нашего демона
    public function consumer()
    {
        $process = new Process('php /var/www/app/bin/console rabbitmq:consumer exchg_rabbit > /dev/null 2>&1 &', '/var/www/app/');
        $process->start();
        $pid=$process->getPid();
        if(!empty($pid)) {
            return new Response(json_encode($pid+1));
            //return new Response( "Instance started successfull<br><a href=/service/manager/>Return to Manager</a>");
        }
        else {
            return new Response(json_encode(false));
            //return new Response( "Instance execution error<br><a href=/service/manager/>Return to Manager</a>");
        }
    }

    /**
     * @Route("/service/manager")
     *
     * @Route("/service")
     */

    //Просмотр и килл выборочно процессов и просмотр лога
    public function manager()
    {
        //поищем в базе, что у нас там есть
        $daemons = $this->getDoctrine()->getRepository(DaemonManager::class);
        $daemonsList = $daemons->findBy(['status' => 1]);
        $runningList = [];

        $counter = 0;
        foreach ($daemonsList as $daemon)
        {
            //проверяем и если есть живой, то пишем в наш массив
            if(posix_kill($daemon->getPid(),0)){
                $runningList[$counter]=[];
                $runningList[$counter]['id'] = $daemon->getId();
                $runningList[$counter]['pid'] = $daemon->getPid();
                $runningList[$counter]['status'] = $daemon->getStatus();
                $counter++;
            }
            else
            {
                // убиваем в базе демонов, которых уже нет в процессах (в живых)
                $em = $this->getDoctrine()->getManager();
                $em->remove($daemon);
                $em->flush();
            }
        }

        return $this->render('service/index.html.php', [
            'daemonsList' => $runningList,

        ]);
    }

    /**
     * @Route("/service/kill/{pid}")
     *
     * @Route("/service/kill")
     */

    // Если надо убить процесс или остановить все
    public function kill($pid = null)
    {
        $log = new Logger('kill');
        $log->pushHandler(new StreamHandler('../var/log/own.log', Logger::DEBUG));
        $log->debug("Requested to kill PID = ".$pid);

        if (!empty($pid)) {
            $daemons = $this->getDoctrine()->getRepository(DaemonManager::class);
            $daemon = $daemons->findOneBy(['pid' => $pid]);

            if (!empty($daemon) && $daemon->getStatus() == 1) {

                if (posix_kill($pid, 9)) {
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($daemon);
                    $em->flush();
                    $log->debug("Successfully killed PID = ".$pid);
                } else {
                    $log->debug("Kill failed = PID ".$pid);
                }
            } else {
                $log->debug("Can't find process with PID = ".$pid);
            }
        }
        die();
    }

    /**
     *
     * @Route("/service/send-msg/", methods={"POST"})
     *
     * @Route("/service/send-msg")
     *
     */

    // Отправка сообщения
    public function sendMsg(Request $request)
    {
        $msg = $request->request->get('msg');
        $error = $this->get('old_sound_rabbit_mq.exchg_rabbit_producer')->publish($msg);

        $log = new Logger('sendMsg');
        $log->pushHandler(new StreamHandler('../var/log/own.log', Logger::DEBUG));
        $log->debug("Recievied message = '".$msg."'");

        if(empty($data))
            return new Response(json_encode(true));
        else
            return new Response(json_encode(false));
    }


    /**
     * @Route("/service/get-log")
     */

    // обновляем лог дабы посмотреть что у нас там есть
    public function getLog()
    {
        $data = [];
        $path = "../var/log/own.log";
        $file = file($path);

        $data['source'] = $path;
        $data['timestamp'] = date("d-m-Y H:m:s", time());
        $data['contents'] = array_slice($file, count($file) - 20, count($file));

        if(!empty($data))
            return new Response(json_encode($data));
        else
            return new Response(json_encode(false));
    }

}
