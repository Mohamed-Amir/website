<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>تسجيل الدخول</title>
    <link rel="icon" type="image/x-icon" href="/Fronted/assets/img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/Fronted/css/font-awesome.min.css">
    <link href="/Fronted/css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="sidebar-noneoverflow">
<section class="section">
    <div class="container">
        <div class="user signinBx">
            <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
            <div class="formBx">
                <form id="login-form" action="" onsubmit="return false;">
                    <h2>تسجيل الدخول</h2>
                    <input type="email" required name="email" placeholder="البريد الالكتروني" />
                    <input type="password" required name="password" placeholder="كلمة السر" />
                    <button id="saveLogin" class="submitLogin" type="submit">تسجيل الدخول</button>

                    <p class="signup">
                        ليس لديك حساب ؟
                        <a href="#" onclick="toggleForm();">تسجيل حساب</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="user signupBx">
            <div class="formBx">
                <form id="register-form" action="" onsubmit="return false;">
                    <h2>حساب جديد</h2>
                    <input type="text" required name="name" placeholder="الاسم" />
                    <input type="email" required name="email" placeholder="البريد الالكتروني" />
                    <input type="text" required name="phone" placeholder="رقم الهاتف" />
                    <input type="password" required name="password" placeholder="كلمة السر" />
                    <button id="saveRegister" type="submit" class="submitLogin">تسجيل</button>
                    <p class="signup">
                        ليدك حساب ؟
                        <a href="#" onclick="toggleForm();">تسجيل الدخول</a>
                    </p>
                </form>
            </div>
            <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
        </div>
    </div>
</section>
<script src="/Fronted/js/script.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

@include('Admin.includes.scripts.AlertHelper')

{{--- Login Route --}}
<script>
    $('#login-form').submit(function (e) {
        e.preventDefault();
        $("#saveLogin").attr("disabled", true);

        var formData = $('#login-form').serialize();
        $.ajax({
            url: '/logged?'+formData,
            type: "get",
            success: function (data) {
                $("#saveLogin").attr("disabled", false);
                if (data.status == 1) {

                    swal(data.message, {
                        icon: "success",
                    });
                    setTimeout(function(){ location.href='/'; }, 1000);

                    $("#saveLogin").attr("disabled", false);
                }else{
                    var msg= 'المعلومات المدخلة غير موجودة لدينا';
                    if("{{getLang()}}" == 'en')
                        msg ='invalid email or password';
                    swal(msg, {
                        icon: "error",
                    });
                }
            }
        });
    })
</script>

{{--- register Route --}}
<script>
    $('#register-form').submit(function (e) {
        e.preventDefault();
        $("#saveRegister").attr("disabled", true);

        var formData = $('#register-form').serialize();
        $.ajax({
            url: '/register?'+formData,
            type: "get",
            success: function (data) {
                $("#saveRegister").attr("disabled", false);
                if (data.status == 1) {

                    swal(data.message, {
                        icon: "success",
                    });
                    setTimeout(function(){ location.href='/'; }, 1000);


                    $("#saveRegister").attr("disabled", false);
                }else{
                    swal(data.message, {
                        icon: "error",
                    });
                }
            }
        });
    })
</script>

</body>
</html>