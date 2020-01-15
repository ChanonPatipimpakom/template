<?php
    session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Soi5 Used Cars</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Soi 5 ElecIT</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i> หน้าหลัก</a></li>
            <li><a href="index.php?category=search"><i class="fa fa-search fa-fw"></i> ค้นหา</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <?php
                if(isset($_SESSION['id'])){
            ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="glyphicon glyphicon-user"></i>
                        <?php echo $_SESSION['name'];?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
            <?php
                    } 
                    else{
                ?>
            <li>
                <a href="login.php">
                    <i class="fa fa-lock fa-fw"></i> เข้าสู่ระบบ
                </a>
            </li>
            <?php
                    }
                ?>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart fa-fa"></i> (0)
                </a>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="text-center">
                        <a href="#">สินค้าของเรา</a>
                    </li>
                    <li>
                        <a href="index.php?category=all" class="active"></i> สินค้าทั้งหมด</a>
                    </li>
                    <li>
                        <a href="showproduct.php?category=1" class="active"></i> คอมพิวเตอร์</a>
                    </li>
                    <li>
                        <a href="showproduct.php?category=2" class="active"></i> (สำหรับคนทำประเภทนะครับ)</a>
                    </li>
                    <li>
                        <a href="showproduct.php?category=3" class="active"></i> (สำหรับคนทำประเภทนะครับ)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <?php
                if(isset($_GET['category'])){
                    $menu = $_GET['category'];
                }
                else{
                    $menu="";
                }
                switch($menu){
                    case "all":{
                        $page = "product.php";
                        break;
                    }
                    case "post":{
                        $page = "postcar.php";
                        break;
                    }
                    case "edit":{
                        $page = "edit.php";
                        break;
                    }
                    case "search":{
                        $page = "searchproduct.php";
                        break;
                    }
                    default:{
                        $page = "main.php";
                    }
                }
                include($page);
            ?>           

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".linkDelete").click(function(){
            if(confirm("confirm delete?")){
                return true;
            }else{
                return false;
            }

            return confirm("confirm delete")
        });
    });
</script>
</body>
</html>
