
    function showRegisterForm() {
        $('.loginBox').fadeOut('fast', function () {
            $('.registerBox').fadeIn('fast');
            $('.login-footer').fadeOut('fast', function () {
                $('.register-footer').fadeIn('fast');
            });
            $('.modal-title').html('Регистрация с помощью');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }
    function showLoginForm() {
        $('#loginModal .registerBox').fadeOut('fast', function () {
            $('.loginBox').fadeIn('fast');
            $('.register-footer').fadeOut('fast', function () {
                $('.login-footer').fadeIn('fast');
            });
            $('.modal-title').html('Войти ');
        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function openLoginModal() {
        showLoginForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }
    function openRegisterModal() {
        showRegisterForm();
        setTimeout(function () {
            $('#loginModal').modal('show');
        }, 230);
    }

    /*   function loginAjax() {
     *
     }*/

    function shakeModal() {
        $('#loginModal .modal-dialog').addClass('shake');
        $('.error').addClass('alert alert-danger').html("Пользователь или пароль не верны");
        $('input[type="password"]').val('');
        setTimeout(function () {
            $('#loginModal .modal-dialog').removeClass('shake');
        }, 1000);
    }

    $(document).ready(function () {

        $("#LoginDB").click(function () {
            var form_email = $('#email').val();
            var Pass = $('#password').val();
            $.ajax({type: "POST",
                url: "/user/loginControl",
                data: {email: form_email,
                    password: Pass
                },
                success: function (result) {
                    //  alert("Вы зарегистрировались");

                    document.location.href = "/product/index.php";
                },
                error: function (jqxhr, status, errorMsg) {
                    shakeModal();
                }
            });

        }); //  

        openLoginModal();
    });