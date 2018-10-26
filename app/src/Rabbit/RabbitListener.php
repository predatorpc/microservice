<?php

/*
 * Модуль обработки сообщения от rabbitmq
 * Michael S. Merzlyakov AKA predator_pc@17102018
 *
 */

namespace App\Rabbit;

use App\Entity\DaemonManager;
use Doctrine\ORM\EntityManagerInterface;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/*
*
* Class NotificationConsumer
*
*/

class RabbitListener implements ConsumerInterface
{
    /**
    * @var AMQPMessage $msg
    * @return void
    */

    public function __construct(LoggerInterface $logger, EntityManagerInterface $em)
    {
        // Пишем в лог наш PID
        $log = new Logger('daemon');
        $log->pushHandler(new StreamHandler('var/log/own.log', Logger::DEBUG));
        $log->debug("Successfully started Daemon instance with PID = ".getmypid());

        // Пишем в базу наш PID
        $daemon = new DaemonManager();
        $daemon->setPid(getmypid());
        $daemon->setStatus(1);
        $em->persist($daemon);
        $em->flush();
    }

    public function execute(AMQPMessage $msg)
    {
        // Логируем полученные данные и PID получившего данные форка
        $log = new Logger('execute');
        $log->pushHandler(new StreamHandler('var/log/own.log', Logger::DEBUG));
        $log->debug($msg->getBody()." [Execution PID] ".getmypid());

    }
}

?>