<?php

?>
<!DOCTYPE html>
<html>
<body>

<center><h2>ForgotPassword</h2></center>
<center><p>Please provide us your email so we can send you a recovery mail</p></center>
<br>
<br>
<form action="../controller/forgotPass.php" style="width:60%;margin:auto;" method="get">
    <fieldset>
        <legend>PASSWORD RECOVERY FORM</legend>
        EMAIL<br>
        <input type="email" name="email" id="email" value="">
        <br>
       <br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>
