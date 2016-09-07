<?php session_start();
require_once('../comman/db_function.php');
if(!isset($_SESSION['login_username'])){
page_redirection("../index.php","Session Expair Please Login");
}
 ?>

<?php 

   // require_once('../functions/db_function.php');

 ?>

 <?php //check_session(); ?>

<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>CRM</title>



    <!-- Bootstrap Core CSS -->

    <link href="../webtemplate/css/bootstrap.min.css" rel="stylesheet">

<link href="../webtemplate/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


    <!-- MetisMenu CSS -->

    <link href="../webtemplate/css/metisMenu.min.css" rel="stylesheet">

<link href="../webtemplate/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->

    <link href="../webtemplate/css/timeline.css" rel="stylesheet">

 <link href="../webtemplate/css/mystyle.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="../webtemplate/css/sb-admin-2.css" rel="stylesheet">



    <!-- Morris Charts CSS -->

    <link href="../webtemplate/css/morris.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="../webtemplate/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->



</head>

