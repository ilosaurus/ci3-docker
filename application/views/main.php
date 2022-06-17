<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?=APP_TITLE?></title>
        <meta name="viewport"       content="width=device-width, initial-scale=1.0">
        <meta name="description"    content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
        <meta name="author"         content="Coderthemes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://coderthemes.com/minton/layouts/assets/images/favicon.ico">
        <!-- App css -->
        <!-- Jquery Toast css -->
        <link href="<?=base_url()?>assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/default/bootstrap.min.css"                                        rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="<?=base_url()?>assets/css/default/app.min.css"                                              rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="<?=base_url()?>assets/css/default/bootstrap-dark.min.css"                                   rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="<?=base_url()?>assets/css/default/app-dark.min.css"                                         rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <!-- icons -->
        <link href="<?=base_url()?>assets/css/icons.min.css"                                                    rel="stylesheet" type="text/css" />
		    <link href="<?=base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"            rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"       rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css"        rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/select2-bootstrap.css">

        <?php
        if($gcrud == 1){
            foreach($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach;
        } ?>
        <!-- Vendor js -->
        <script src="<?=base_url()?>assets/js/vendor.min.js"></script>
        <script src="<?=base_url()?>assets/js/select2.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
        <!-- Apex js-->
        <script src="<?=base_url()?>assets/libs/moment/min/moment.min.js"></script>
        <!-- Tost-->
        <script src="<?=base_url()?>assets/libs/jquery-toast-plugin/jquery.toast.min.js"></script>
        <!-- <script src="<?=base_url()?>assets/js/jquery.knob.min.js"></script> -->
        <style media="screen">
            .rating {
                display: inline-block;
                position: relative;
                font-size: 14px;
            }

            .rating label {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                cursor: pointer;
            }

            .rating label:last-child {
                position: static;
            }
            .rating label:nth-child(1) {
                z-index: 5;
            }
            .rating label:nth-child(2) {
                z-index: 4;
            }
            .rating label:nth-child(3) {
                z-index: 3;
            }
            .rating label:nth-child(4) {
                z-index: 2;
            }
            .rating label:nth-child(5) {
                z-index: 1;
            }
            .rating label input {
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
            }

            .rating label .icon {
                float: left;
                color: transparent;
            }

            .rating label:last-child .icon {
                color: #000;
            }

            .rating:not(:hover) label input:checked ~ .icon,
            .rating:hover label:hover input ~ .icon {
                color: #f7b84b;
            }

            .rating label input:focus:not(:checked) ~ .icon:last-child {
                color: #000;
                text-shadow: 0 0 5px #f7b84b;
            }
        </style>
    </head>
    <body class="loading" data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <?php $this->load->view("layout/notification"); ?>
                        <?php $this->load->view("layout/profile");?>
                    </ul>
                    <?php $this->load->view("layout/logo");?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->
            <?php $this->load->view("layout/menu");  ?>
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
						<?php /*
					   <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                  <?php
                                      if(isset($var_title)){
                                          ?>
                                              <h4 class="page-title"><?=$var_title?></h4>
                                          <?php
                                      }
                                  ?>
                                    <div class="page-title-right">
                                      <ol class="breadcrumb m-0">
                                          <?php
                                          if(isset($var_breadcrumb)){
                                                  foreach ($var_breadcrumb as $value) {
                                                      ?>
                                                       <li class="breadcrumb-item <?=$value['url']?>"><?=$value['title']?></li>
                                                      <?php
                                                  }
                                              }
                                          ?>
                                      </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
						 */ ?>
                        <!-- end page title -->
                        <?php
                            if($gcrud == 1){
                                if(!empty($gcrud_extend_view)){
                                  $this->load->view("module/".$gcrud_extend_view,$var_other);
                                }else{
                                  echo $output;
                                }
                                // echo view("module/".$module,$var_other);
                            }else{
                                //print_r($var_other);
                                $this->load->view("module/".$var_module,$var_other);
                            ?>
                        <?php }
                        ?>
                    </div> <!-- container -->
                </div> <!-- content -->
                <?php $this->load->view("layout/footer"); ?>
            </div>
        </div>
        <!-- END wrapper -->
        <!-- App js -->
        <script>
          function ajax_secure_post(url,datapost,callback){
            $.post(url,datapost,function(data){
              callback(data);
            });
          }
          function ajax_secure_upload(url,formData,callback){
            $.ajax({
                   url : url,
                   type : 'POST',
                   data : formData,
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,  // tell jQuery not to set contentType
                   success : function(data) {
                       callback(data);
                   }
            });
          }
          <?php
            $alert = $this->session->flashdata("alert");
            if(isset($alert['status'])){
              if($alert['status']){
                  ?>
                  $.toast({
                    text : "<?=$alert['msg']?>",
                    showHideTransition : 'slide',  // It can be plain, fade or slide
                    bgColor : '#1abc9c',              // Background color for toast
                    textColor : 'white',            // text color
                    allowToastClose : true,       // Show the close button or not
                    hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                    stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                    textAlign : 'left',            // Alignment of text i.e. left, right, center
                    position : 'bottom-right'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                  });
                  <?php
              }else{
                ?>
                $.toast({
                  text : "<?=$alert['msg']?>",
                  showHideTransition : 'slide',  // It can be plain, fade or slide
                  bgColor : '#f1556c',              // Background color for toast
                  textColor : 'white',            // text color
                  allowToastClose : true,       // Show the close button or not
                  hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                  stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                  textAlign : 'left',            // Alignment of text i.e. left, right, center
                  position : 'bottom-right'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                });
                <?php
              }
            }
          ?>

        </script>
        <script src="<?=base_url()?>assets/js/app.min.js"></script>
		    <script src="<?=base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url()?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script>

        <?php
        if($gcrud == 1){
            foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script><?php
            endforeach;
        } ?>
    </body>
</html>
