<?= form_open('login/proses_login'); ?>
<div class="login-dark">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <!-- form card login -->
                        <div class="card text-white border-info bg-dark mb-3 ">
                            <div class="card-header border-info">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
                            <div class="alert alert-info" role="alert">
                        <?php
                            if(isset($message)){
                                echo $message;
                            }
                            else{
                                echo "Please Insert your username and password";
                            }
                        ?>
                    </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                                    <label for="uname1">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="uname1" id="uname1" placeholder="username" required="">
                                    </div>
                            <div class="form-group">
                                <div class="invalid-feedback">Oops, you missed this one.</div>
                            </div>
                            <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                                        </div>
                                        <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="pwd1" placeholder="******" required="" autocomplete="new-password">
                                    </div>
                                <div class="invalid-feedback">Enter your password too!</div>
                                <br>
                            <button type="submit" class="btn btn-outline-success btn-block active" id="btnLogin">Login</button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                    
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
</div>
<?= form_close() ?>