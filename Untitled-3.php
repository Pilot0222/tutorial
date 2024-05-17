<?php
include('../server/conn.php');
$err = array();
if(isset($_POST['']))
{
    $mail = $_POST['e-mail'];
    $pass = $_POST['password'];
    if($mail== '')
    {
        $err[] = "Enter E-mail<br>";
    }
    if($pass == '')
    {
        $err[] = "Enter Password<br>";
    }
    $checkers = mysqli_query($conn,"select * from reg_aigs_tab
    where
    email = '$mail' and password = '$pass'
	")or die('could not select from reg_aigs_tab table'.mysqli_error());
    $checker_num = mysqli_num_rows($checkers);
    if($checker_num>0)
    {
        $feters= mysqli_fetch_assoc($checkers);
        $aigs_id = $feters['reg_aigs_tab_id'];
        session_start();
        $_SESSION['aigs'] = $aigs_id;
        header("location:invoice.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon"  href="../images/aigs.fw.png"/>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<script src="aigs.js"></script>
<title>AIGS</title>
</head>
<body>
<div class="aigs_wrapper">
      <div class="headers">
      <div class="header_part">
      <div class="best_header">
<imgsrc="../images/aigs.fw.png" class="img_logo" />
<div class="main_title">AUTOMATIC INVOICE GENERATION</div>
<div class="best_ti_sub"> SYSTEM</div>
</div>
</div>
</div>
<div class="body_auto">
          <div class="auto_main_reg">
          <div class="auto_best_reg">
          <label class="meme">LOGIN</label>
<form action="" method="post" enctype="multipart/form-data" 
class="aigs_from">
<input type="email" name="e-mail" placeholder="E-mail" class="aigs_reg" />
<input  type="password" name="password" placeholder="Password" 
class="aigs_reg" />
<input type="submit" name="sub_aigs" value="SUBMIT" class="sun_aigs" />
</form>
</div>
</div>
<div class="footer_auto">
          <div class="auto_f">
           <div class="auto_c">Alright Reserved and Designed by Esomchi</div>
</div>
</div>
</div>
</body>
</html>
