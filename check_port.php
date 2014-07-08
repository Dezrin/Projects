<form action="" method="post">
    <table>
        <tr>
            <th>IP or Domain</th>
            <td><input type="text" name="ip" value="<?php if(isset($_POST['ip'])) echo $_POST['ip']; else echo $_SERVER['REMOTE_ADDR']; ?>" /></td>
        </tr>
        <tr>
            <th>Port</th>
            <td><input type="text" name="port" value="<?php if(isset($_POST['port'])) echo $_POST['port']; else echo "80"; ?>" /></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" value="Check status" /></td>
        </tr>
    </table>
</form>
 
<?php
//Check if form is submitted
if(!empty($_POST)){
    //setting up the connection to the server, this requires fsockopen function activated
    $socket = @fsockopen($_POST['ip'], $_POST['port'], $errno, $errstr, 3);
    //if the connection is not false then the port is opened
    if($socket) $message = "<font style='color:green'>opened</font>"; else $message = "<font style='color:red'>closed</font>";
    //displaying a message if opened or not
    echo "We have scanned the port: <strong>".$_POST['port']."</strong> on that ip (<strong>".$_POST['ip']."</strong>) and the port is ".$message."!";
}
?>