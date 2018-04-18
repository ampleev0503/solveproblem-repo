
<link rel="stylesheet" href="../vendor/bootstrap4/css/bootstrap.min.css" />
<link rel="stylesheet" href="../vendor/fontawesome5/css/fontawesome-all.min.css" />
<link rel="stylesheet" href="../css/defaultlogin.css" />
<script src="../vendor/jquery3/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../vendor/tether/js/tether.min.js"></script>
<script type="text/javascript" src="../vendor/bootstrap4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/login.js"></script>

<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <a class="btn btn-default" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Войти</a>
            <a class="btn btn-default" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Регистрация</a>
        </div>

    </div>
</div> 

<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login with</h4>
            </div>
            <div class="modal-body"> 
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a class="circle github" href="#">
                                <i class="fab fa-github "></i>
                            </a>
                            <a id="google_login" class="circle google" href="#">
                                <i class="fab fa-google-plus-g "></i>
                            </a>
                            <a id="facebook_login" class="circle facebook" href="#">
                                <i class="fab fa-facebook "></i>
                            </a>

                        </div>
                        <div class="division">
                            <div class="line l"></div>
                            <span>or</span>
                            <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                            <form method="" action="" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                <input id="email1" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password1" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>Looking to 
                        <a href="javascript: showRegisterForm();">create an account</a>
                        ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
                </div>
            </div> 
        </div>
    </div>
</div>
