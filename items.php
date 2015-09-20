<?php
require_once 'autoload.php';
//$user = User::get_current_user();
?>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Looking To Play</title>
    <!-- STYLES -->
    <!-- build:css lib/css/main.min.css -->
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/rdash-ui/dist/css/rdash.min.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" href="/bower_components/angular-chart.js/angular-chart.css">
    <!-- endbuild -->
    <!-- SCRIPTS -->
    <!-- build:js lib/js/main.min.js -->
    <script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <!-- endbuild -->
    <link rel="stylesheet" href="/bower_components/fullcalendar/dist/fullcalendar.css"/>
    <!-- Custom Fonts -->
    <link href="/css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/ngDialog/js/ngDialog.js"></script>
    <script src="/bower_components/Chart.js-master/Chart.js"></script>
    <!-- Custom Scripts -->
    <script src="/bower_components/angular-chart.js/angular-chart.js"></script>
<!-- Firebase -->
<script src="https://cdn.firebase.com/js/client/2.2.4/firebase.js"></script>
<!-- AngularFire -->
<script src="https://cdn.firebase.com/libs/angularfire/1.1.2/angularfire.min.js"></script>
    <script type="text/javascript" src="/angular/items1.js"></script>
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
                        <div class="col-lg-12">
                            <rd-widget>
                                <rd-widget-header title="Basket of Goods">
                                </rd-widget-header>
                                <rd-widget-body> 
                                    <canvas id="line" class="chart chart-line" chart-data="data.dataset"
                                    chart-labels="data.labels" chart-legend="true" chart-series="data.series"
                                    chart-click="onClick" height="15" width="100" style="width:150px">
                                    </canvas> 
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                        <div class="col-lg-12" style="margin-bottom:10px;">
                            <rd-widget>
                                <rd-widget-header title="Your Tracked Items ({{data.items.length}})">
                                </rd-widget-header style="margin-bottom:0px;">
                            </rd-widget>
                        </div>
<!--                         <div class="col-lg-6">
                            <rd-widget>
                                <rd-widget-body>
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
                        </div> -->
                        <div class="col-lg-6" style="margin-bottom:10px;" ng-repeat="item in data.items | orderBy:'-percent_left'">
                            <rd-widget>
                                <rd-widget-body>
                                    <div ng-class="item.pull_class">
                                        <i ng-class="item.widget_class"></i>
                                    </div>
                                    <div class="title" style="display:inline-block;" tooltip="{{item.item_name}}">{{item.item_name | limitTo:12}}<span ng-show="item.item_name.length > 12">...</span><small style="font-size:12px;"> ({{item.percent_left}}% left)</div>
                                    <span ng-class="item.label_class" style="float:right;">{{item.status}}</span>
                                    <div class="comment">
                                        <span ng-style="item.color_code">
                                            {{item.status}}</span> - 
                                        Buy within the next 3 day(s)
                                        <a href style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        <br/><br/>
                                        <a ng-href="http://www.amazon.com/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords={{item.item_name}}"><i class="fa fa-amazon"></i> Buy Now Amazon</a>
                                    </div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                        <div class="col-lg-6" style="margin-bottom:10px;" ng-show="data.cookies">
                            <rd-widget>
                                <rd-widget-body>
                                    <div class="widget-icon brown pull-left">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="title" style="display:inline-block;" tooltip="President's Choice Decadent Cookies">President's Choice ...<small style="font-size:12px;"> (2.8% left)</div>
                                    <span class="label label-danger" style="float:right;">Almost None</span>
                                    <div class="comment">
                                        <span style="color:red;">
                                            Almost None</span> - 
                                        Buy by the end of today
                                        <a href style="float:right;">View More <i class="fa fa-chevron-right"></i></a>
                                        <br/><br/>
                                        <a ng-href="http://www.amazon.com/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords={{item.item_name}}"><i class="fa fa-amazon"></i> Buy Now Amazon</a>
                                    </div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
 <!--                            <div class="col-lg-12" style="margin-bottom:10px;">
                                <rd-widget>
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                                    <rd-widget-body>
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
                            </ -->
                        </div>
<!--                         <div class="col-lg-6" ng-show="currentSelectedItem != {}">
                            <rd-widget ng-show="currentSelectedItem">
                                <rd-widget-header title="{{currentSelectedItem.item_name}}">
                                    <a href ng-click="currentSelectedItem = {}">Cancel</a>
                                </rd-widget-header>
                                <rd-widget-body ng-show="currentSelectedItem">
                                    <div class="mesasge">
                                            <strong>Average Percentage:</strong> {{currentSelectedItem.currentUsage | limitTo:3}}%
                                            <strong>Average Turnover:</strong> One unit used in {{currentSelectedItem.turnover}} days
                                    </div>
                                    <canvas id="line" class="chart chart-line" chart-data="data.dataset"
                                    chart-labels="data.labels" chart-legend="true" chart-series="data.series"
                                    chart-click="onClick" height="150px">
                                    </canvas> 
                                </rd-widget-body>
                            </rd-widget>
                        </div> -->
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
                    </div>
                </div>  
            </div><!-- End Page Content -->
        </div><!-- End Content Wrapper -->
    </div><!-- End Page Wrapper -->
</body>
</html>