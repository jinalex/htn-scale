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
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/hackthenorth/css/styles.css" />
    
    <script src="/hackthenorth/src/vendor/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="/hackthenorth/dist/quagga.js" type="text/javascript"></script>
<script src="https://cdn.firebase.com/js/client/2.2.9/firebase.js"></script>
    <script src="/hackthenorth/live_w_locator.js" type="text/javascript"></script>
</head>
<body ng-controller="controller">
    <div id="page-wrapper" ng-class="{'open': toggle}" ng-cloak>
<!-- Sidebar -->
    <?php require_once 'ui/sidebar.php';?>

<!-- End Sidebar -->
        <div id="content-wrapper">
            <div class="page-content">
  </head>

    <section id="container" class="container">
        <h3>Scan a barcode.</h3>
        <div class="controls">
            <fieldset class="input-group">
                <button class="stop">Stop</button>
            </fieldset>
            <fieldset class="reader-config-group">
                <label>
                    <span>Barcode-Type</span>
                    <select name="decoder_readers">
                        <option value="code_128" selected="selected">Code 128</option>
                        <option value="code_39">Code 39</option>
                        <option value="ean">EAN</option>
                        <option value="ean_8">EAN-8</option>
                        <option value="upc">UPC</option>
                        <option value="upc_e">UPC-E</option>
                        <option value="codabar">Codabar</option>
                        <option value="i2of5">I2of5</option>
                    </select>
                </label>
                <label>
                    <span>Resolution (long side)</span>
                    <select name="input-stream_constraints">
                        <option value="320x240">320px</option>
                        <option selected="selected" value="640x480">640px</option>
                        <option value="800x600">800px</option>
                        <option value="1280x720">1280px</option>
                        <option value="1600x960">1600px</option>
                        <option value="1920x1080">1920px</option>
                    </select>
                </label>
                <label>
                    <span>Patch-Size</span>
                    <select name="locator_patch-size">
                        <option value="x-small">x-small</option>
                        <option value="small">small</option>
                        <option selected="selected" value="medium">medium</option>
                        <option value="large">large</option>
                        <option value="x-large">x-large</option>
                    </select>
                </label>
                <label>
                    <span>Half-Sample</span>
                    <input type="checkbox" checked="checked" name="locator_half-sample" />
                </label>
                <label>
                    <span>Workers</span>
                    <select name="numOfWorkers">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option selected="selected" value="4">4</option>
                        <option value="8">8</option>
                    </select>
                </label>
            </fieldset>
        </div>
      <div id="result_strip">
        <ul class="thumbnails"></ul>
        <ul class="collector"></ul>
      </div>
      <div id="interactive" class="viewport"></div>
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
                </div>  
            </div><!-- End Page Content -->
        </div><!-- End Content Wrapper -->
    </div><!-- End Page Wrapper -->
</body>
</html>