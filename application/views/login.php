
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | <?=APP_TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Bank Jateng" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

		<!-- App css -->
		<link href="<?=base_url()?>assets/css/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="<?=base_url()?>assets/css/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link href="<?=base_url()?>assets/libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url()?>assets/css/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="<?=base_url()?>assets/css/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="<?=base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="" data-sidebar-size="default" data-sidebar-color="light" data-layout-width="fluid" data-layout-menu-position="fixed" data-sidebar-showuser="false" data-topbar-color="dark">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                          <span class="logo-lg">
                                              <h1><?=APP_TITLE; ?></h1>
                                          </span>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Enter your Username and password to access system.</p>
                                </div>

                                <form id="form">

                                    <div class="mb-2">
                                        <label for="emailaddress" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" required placeholder="Enter your Username">
                                    </div>

                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control" required placeholder="Enter your password">

                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                             <div class="alert alert-danger" role="alert" id="danger" style="display:none;"></div>
                                        </div>
                                    </div>

                                    <div class="d-grid mb-0 text-center">
                                        <button class="btn btn-primary" type="button" onclick="postData()"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2022 © Jenkins by <a href="" class="text-dark">Candra Adi Nugroho</a>
        </footer>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>


</body>
</html>

<script>
     function ajax_secure_post(url,datapost,callback){
      $.post(url,datapost,function(data){
        callback(data);
      });
     }

     function postData(){
          ajax_secure_post("<?=base_url('api/login/')?>",$("#form").serializeArray(),function(data){
               if(data.status == true){
                    window.location.href = "<?=base_url()?>main";
               }else{
                    document.getElementById("danger").style.display = "block";
                    document.getElementById("danger").innerHTML = data.msg;
               }
          });
     }
</script>
