<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daemon Managment Tool</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body >

<h2 align="center">Daemon management interface</h2>

<table border="0" width="60%" heigh="100%" cellpadding="20" cellspacing="0" align="center" style="border: 1px solid gray">
    <tr>
        <td width="300" height="30"><b>Operations and monitoring</b></td>
        <td><b>Log</b></td>
    </tr>
    <tr>
        <td valign="top">
            <?php if (!empty($daemonsList)) { ?>

                <table border="0" cellspacing="0" cellpadding="5" width="200" height="100%" style="border: 1px solid #c9c9c9;">
                <tr>
                    <td align="center">PID</td>
                    <td align="center">Action</td>
                </tr>

            <?php foreach ($daemonsList as $item) { ?>

                <tr>
                    <td align="center"><?=$item['pid']?></td>
                    <td align="center"><button id="<?=$item['pid']?>" class="killDaemon">Kill</button><br></td>
                </tr>

            <?php } ?>

                <tr><td align="center" colspan="2"><button id="startDaemon">Start new instance</button><br></td></tr>
                </table>

            <?php } else { ?>

                It seems there is no active Consumers<br>
                <button id="startDaemon">Start new instance</button><br>

            <?php } ?>
        </td>
        <td valign="top">
            <textarea id="log" rows="15" cols="100"></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" height="10">
            <h2 align="center">Send test message</h2>
        </td>
    </tr>
<tr>
    <td valign="top" align="center" colspan="2">
        <table border="0" cellpadding="2" cellspacing="0" align="center" width="50%">
            <tr>
                <td>Message</td>
            </tr>
            <tr>
                <td><textarea id="msg" rows="5" cols="100"></textarea></td>
            </tr>
            <tr>
                <td><button id="sendMessage">Send message</button></td>
            </tr>
        </table>

    </td>
</tr>

</body>

<script>

    $(document).ready(function() {
        RequestLog(); // for the first time

        $("#sendMessage").click(function(){
            var text = $("#msg").val();
            $.ajax({
                url: "/service/send-msg",
                type: "POST",
                data: { msg: text },
                dataType: "JSON",
                async: true,
                success: function (response) {
                    console.log(response);
                }
            });
            setTimeout(function(){ window.location.reload()},1000);
        });

        $("#startDaemon").click(function(){
            $.ajax({
                url: "/service/consumer",
                type: "POST",
                data: {},
                dataType: "JSON",
                async: false,
                success: function (response) {
                    if(!response){
                        console.error("Error creating Daemon instance");
                    }
                    else
                    {
                        alert('Daemon instance successfully started with PID='+response);
                    }
                }
            });

            setTimeout(function(){ window.location.reload()},2000);
        });

        $(".killDaemon").click(function(){

            var id = $(this).attr("id");
            console.log(id);

             $.ajax({
                url: "/service/kill/"+id,
                type: "GET",
                data: { },
                dataType: "JSON",
                async: true,
                success: function (response) {
                    if(!response){
                        console.error("Can't kill Daemon instance");
                    }
                    else
                    {
                        alert('Daemon instance successfully killed');
                    }
                }
            });
            setTimeout(function(){ window.location.reload()},2000);
        });

        function RequestLog() {
            $.ajax({
                url: "/service/get-log",
                type: "POST",
                data: {},
                dataType: "JSON",
                async: false,
                success: function (response) {
                    //console.warn(response['contents']);

                    if (!response) {
                        console.error("Error reading file contents");
                    }
                    else {
                        $("#log").text(' ');
                        response['contents'].forEach(function(item){
                            //$("#log").text('');
                            $("#log").append(item);

                        });
                        $("#log").scrollTop($("#log")[0].scrollHeight);
                    }
                }
            });
        }
        setInterval(RequestLog, 5000);
    });

</script>
</html>