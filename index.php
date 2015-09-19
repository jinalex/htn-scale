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
    <link rel="stylesheet" type="text/css" href="/hackthenorth/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/hackthenorth/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/hackthenorth/bower_components/rdash-ui/dist/css/rdash.min.css">
    <link rel="stylesheet" type="text/css" href="/hackthenorth/css/index.css">
    <!-- endbuild -->
    <!-- SCRIPTS -->
    <!-- build:js lib/js/main.min.js -->
    <script type="text/javascript" src="/hackthenorth/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/hackthenorth/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <script type="text/javascript" src="/hackthenorth/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/hackthenorth/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <!-- endbuild -->
    <link rel="stylesheet" href="/hackthenorth/bower_components/fullcalendar/dist/fullcalendar.css"/>
    <!-- Custom Fonts -->
    <link href="/hackthenorth/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="/hackthenorth/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/hackthenorth/bower_components/ngDialog/js/ngDialog.js"></script>
    <!-- Custom Scripts -->
    <script type="text/javascript" src="/hackthenorth/angular/index.js"></script>
</head>
<body ng-controller="controller">
    <div id="page-wrapper" ng-class="{'open': toggle}" ng-cloak>
<!-- Sidebar -->
    <?php require_once 'ui/sidebar.php';?>

<!-- End Sidebar -->
        <div id="content-wrapper">
            <div class="page-content">
                <div ui-view>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <rd-widget>
                                <rd-widget-body>
                                    <div class="widget-icon green pull-left">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="title">80</div>
                                    <div class="comment">Users</div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <rd-widget>
                                <rd-widget-body>
                                    <div class="widget-icon red pull-left">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                    <div class="title">16</div>
                                    <div class="comment">Servers</div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <rd-widget>
                                <rd-widget-body>
                                    <div class="widget-icon orange pull-left">
                                        <i class="fa fa-sitemap"></i>
                                    </div>
                                    <div class="title">225</div>
                                    <div class="comment">Documents</div>
                                </rd-widget-body>
                            </rd-widget>
                        </div>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <rd-widget>
                                <rd-widget-body>
                                    <div class="widget-icon blue pull-left">
                                        <i class="fa fa-support"></i>
                                    </div>
                                    <div class="title">62</div>
                                    <div class="comment">Tickets</div>
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