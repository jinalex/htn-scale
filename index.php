<?php
require_once 'autoload.php';
//$user = User::get_current_user();
?>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Item Tracker</title>
    <!-- STYLES -->
    <!-- build:css lib/css/main.min.css -->
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/rdash-ui/dist/css/rdash.min.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <!-- endbuild -->
    <!-- SCRIPTS -->
    <!-- build:js lib/js/main.min.js -->
    <script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <!-- endbuild -->
    <link rel="stylesheet" href="/hackthenorth/bower_components/fullcalendar/dist/fullcalendar.css"/>
    <!-- Custom Fonts -->
    <link href="/hackthenorth/css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="/hackthenorth/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/hackthenorth/bower_components/ngDialog/js/ngDialog.js"></script>
    <!-- Custom Scripts -->
    <script type="text/javascript" src="/hackthenorth/angular/index.js"></script>
<!--     <link rel="stylesheet" type="text/css" href="/hackthenorth/css/mod_style.css" /> -->
</head>
<body ng-controller="controller">
    <div id="page-wrapper" ng-class="{'open': toggle}" ng-cloak>
<!-- Sidebar -->
    <?php require_once 'ui/sidebar.php';?>

<!-- End Sidebar -->
        <div id="content-wrapper">
            <div class="page-content">
                <!-- Header Bar -->
                <div class="row header">
                    <div class="col-xs-12">
                        <div class="user pull-right">
                            <div class="item dropdown">
                                <a href="#" class="dropdown-toggle">
                                    <img src="http://wpuploads.appadvice.com/wp-content/uploads/2014/10/facebookanon.jpg">
                                </a>
                                <?php require_once 'ui/userDropdown.php';?>
                            </div>
                            <div class="item dropdown">
                             <a href="#" class="dropdown-toggle">
                                    <i class="fa fa-bell-o"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        Notifications
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">Server Down!</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="meta">
                            <div class="page">
                                Home
                            </div>
                            <div class="breadcrumb-links">
                                Home
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Bar -->
                <div ui-view>
                    <div class="row">
<!--                         <div class="col-lg-12">
                            <rd-widget>
                                <rd-widget-body>
                                  
                                        <div class="col-lg-3">
                                            <span class="label label-danger">Almost None</span>
                                             - Out by end of today
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="label label-warning">Low</span>
                                             - Out within 2 days
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="label label-info">About halfway
                                            </span> - Out within a week
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="label label-success">Lots</span>
                                             - Out within a month   
                                        </div>
                                    </div>
                                </rd-widget-body>
                            </rd-widget>
                        </div> -->
                        <div class="col-lg-6">
                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-header title="Items Summary">
                                    </rd-widget-header style="margin-bottom:10px;">
                                    <rd-widget-body style="font-family: Ubuntu, sans-serif;">
                                        <div class="widget-icon red pull-left">
                                            <i class="fa fa-plus-square"></i>
                                        </div>
                                        <div class="title" style="display:inline-block;">Advil <small style="font-size:12px;">(2.3% left)</div>
                                        <span class="label label-danger" style="float:right;">Almost None</span>
                                        <div class="comment">
                                            <span style="color:#D9534F;">
                                                Almost None</span> - 
                                            Buy by end of <strong>today</strong>
                                            <a ng-href="item.php" style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </rd-widget-body>
                                </rd-widget>
                            </div>
                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-body style="font-family: Ubuntu, sans-serif;">
                                        <div class="widget-icon blue pull-left">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="title" style="display:inline-block;">Milk <small style="font-size:12px;">(8.5% left)</div>
                                        <span class="label label-warning" style="float:right;">Low</span>
                                        <div class="comment">
                                            <span style="color:#F0AD4E;">
                                                Low</span> - 
                                            Buy within the next 3 day(s)
                                            <a ng-href="item.php" style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </rd-widget-body>
                                </rd-widget>
                            </div>
                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-body style="font-family: Ubuntu, sans-serif;">
                                        <div class="widget-icon blue pull-left">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="title" style="display:inline-block;">Oranges <small style="font-size:12px;">(10.5% left)</div>
                                        <span class="label label-warning" style="float:right;">Low</span>
                                        <div class="comment">
                                            <span style="color:#F0AD4E;">
                                                Low</span> - 
                                            Buy within the next 3 day(s)
                                            <a ng-href="item.php" style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </rd-widget-body>
                                </rd-widget>
                            </div>
                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-body style="font-family: Ubuntu, sans-serif;">
                                        <div class="widget-icon orange pull-left">
                                            <i class="fa fa-tint"></i>
                                        </div>
                                        <div class="title" style="display:inline-block;">Detergent <small style="font-size:12px;">(90.5% left)</div>
                                        <span class="label label-success" style="float:right;">Lots</span>
                                        <div class="comment">
                                            <span style="color:#5CB85C;">
                                                Lots</span> - 
                                            Buy next month
                                            <a ng-href="item.php" style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </rd-widget-body>
                                </rd-widget>
                            </div>
                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-body style="font-family: Ubuntu, sans-serif;">
                                        <div class="widget-icon green pull-left">
                                            <i class="fa fa-glass"></i>
                                        </div>
                                        <div class="title" style="display:inline-block;">Soft Drinks <small style="font-size:12px;">(55.5% left)</div>
                                        <span class="label label-info" style="float:right;">About halfway</span>
                                        <div class="comment">
                                            <span style="color:#428BCA;">
                                                About halfway</span> - 
                                            Buy in a few weeks
                                            <a ng-href="item.php" style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </rd-widget-body>
                                </rd-widget>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <rd-widget style="font-family: Ubuntu, sans-serif;">
                                <rd-widget-header title="Deals">
                                </rd-widget-header>
                                <rd-widget-body>
                                    <div class="message" ng-repeat="message in data.messages">
                                        <div ng-class="message.pullClass">
                                            <i ng-class="message.cssClass"></i>
                                        </div>
                                        <h4 style="display:inline-block">
                                            <a href="#">
                                                {{message.message_title}}
                                            </a>
                                        </h4>
                                        <a href ng-click="close(message.message_id)">
                                            <i class="fa fa-times" style="float:right;"></i>
                                        </a>
                                        <p>
                                            {{message.message_text}}
                                        </p>
                                        <hr>
                                    </div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                    </div>
                </div>  
            </div><!-- End Page Content -->
        </div><!-- End Content Wrapper -->
    </div><!-- End Page Wrapper -->
</body>
</html>