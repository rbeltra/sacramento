<?php function this_page()
      {
          $page='shop';
          return $page;
      }
    //   var_dump($boxes);
?>
<html>
  <head>
    <title>Products</title><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'> -->
    <!--Bootstrap 3.3.2-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="../assets/index/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <!-- <link href="../assets/index/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <!--Icon Fonts-->
    <!-- <link href="../assets/index/css/font-awesome.min.css" rel="stylesheet" media="screen"> -->
    <!-- <link href="../assets/index/css/icon-moon.css" rel="stylesheet" media="screen"> -->
    <!--Animations-->
    <!-- <link href="../assets/index/css/animate.css" rel="stylesheet" media="screen"> -->
    <!--Theme Styles-->
    <link href="../assets/index/css/theme-styles.css" rel="stylesheet" media="screen">
    <!--Color Schemes-->
    <!-- <link class="color-scheme" href="../assets/index/css/colors/color-default.css" rel="stylesheet" media="screen"> -->
    <!--Modernizr-->
        <!-- // <script src="../assets/index/js/libs/modernizr.custom.js"></script> -->

    <!-- Please call pinit.js only once per page -->
    <script type="text/javascript" async defer  data-pin-color="red" data-pin-hover="true" 
    src="//assets.pinterest.com/js/pinit.js"></script>
    <style type="text/css">
     body
     {
       background-color: white !important;
     }
     .product_images {
         width: 250px;
         height: 250px;
     }
    </style>
  </head>
  <body>
        <!--Page Preloading-->
    <div id="preloader"><div id="spinner"></div></div>
      <?php include('header.php') ?>
      <div class="container">
             <div class="row">

                 <?php foreach ($boxes as $box) { ?>
                     <div class="col-md-4 text-center">
                         <a href="/sacramento/show_box/<?= $box['id'] ?>">
                             <img src="<?= $box['img'] ?>" class="product_images">

                             <p><?= $box['name'] ?></p>
                         </a>
                     </div>
                 <?php } ?>





<!--                  <div class="col-md-4 text-center">
                     <img src="../assets/img/company_logo.png" class="product_images">
                     <p>box with 10 Items</p>
                 </div>
                 <div class="col-md-4 text-center">
                     <img src="../assets/img/company_logo.png" class="product_images">
                     <p>box with 15 Items</p>
                 </div>
                 <div class="col-md-6 text-center">
                     <img src="../assets/img/company_logo.png" class="product_images">
                     <p>box with 15 Items</p>
                 </div>
                 <div class="col-md-6 text-center">
                     <img src="../assets/img/company_logo.png" class="product_images">
                     <p>box with 15 Items</p>
                 </div> -->
             </div>

     </div>
      <?php include('footer.php') ?>
      <!--Libraries and Plugins-->
    <!--  <script src="../assets/index/js/libs/jquery-1.11.2.min.js"></script> -->
        <!--  <script src="../assets/index/js/libs/jquery.easing.1.3.js"></script> -->
        <!--  <script src="../assets/index/js/plugins/bootstrap.min.js"></script> -->
        <!--  <script src="../assets/index/js/plugins/jquery.touchSwipe.min.js"></script> -->
        <!--  <script src="../assets/index/js/plugins/jquery.placeholder.js"></script> -->
    <!--  <script src="../assets/index/js/plugins/icheck.min.js"></script> -->
    <!--  <script src="../assets/index/js/plugins/jquery.validate.min.js"></script> -->
        <!-- <script src="../assets/index/js/plugins/gallery.js"></script> -->
    <!--  <script src="../assets/index/js/plugins/jquery.fitvids.js"></script> -->
        <!--  <script src="../assets/index/js/plugins/jquery.bxslider.min.js"></script> -->
        <!--  <script src="../assets/index/js/plugins/waypoints.min.js"></script> -->
    <!--  <script src="../assets/index/js/plugins/smoothscroll.js"></script> -->
            <script src="../assets/index/js/landing2.js"></script>
            <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

 </body>
</html>
