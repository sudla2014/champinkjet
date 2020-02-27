<?php
session_start();
$_SESSION['Ty_Id']=$_POST['Ty_Id'];
$_SESSION['S_Id']=$_POST['S_Id'];
$_SESSION['Or_Width']=$_POST['Or_Width'];
$_SESSION['Or_Long']=$_POST['Or_Long'];
$_SESSION['Or_WorkDay'] = date('Y-m-d');
$_SESSION['Or_ReceiveDay']=$_POST['Or_ReceiveDay'];
$_SESSION['Or_Time']=$_POST['Or_Time'];
$_SESSION['Fname']=$_POST['Fname'];

$_SESSION['Phone']=$_POST['Phone'];
$_SESSION['Line']=$_POST['Line'];
$_SESSION['specifyNumber']=$_POST['specifyNumber'];
$_SESSION['money_status']=$_POST['money_status'];
$_SESSION['money']=$_POST['money'];
$_SESSION['c']=$_POST['c'];
header("Refresh:0; url=ui_workorderown.php");
