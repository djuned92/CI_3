<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$template['title']?></title>

    <!-- global stylesheets -->
    <!-- Bootstrap -->
    <link href="<?=base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets/vendors/nprogress/nprogress.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/css/custom.min.css')?>" rel="stylesheet">
    <!-- custom stylesheets -->
    <?=$template['metadata']?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('layouts/partials/backend/sidebar.php') ?>

        <!-- top navigation -->
        <?php $this->load->view('layouts/partials/backend/top_navigation.php') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        <?=$template['body']?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('layouts/partials/backend/footer.php') ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- global script -->
    <!-- jQuery -->
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/vendors/fastclick/lib/fastclick.js')?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/vendors/nprogress/nprogress.js')?>"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/js/custom.min.js')?>"></script>
    <?=$template['metadata']?>
  </body>
</html>
