<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<style>
    .bg-dark {
    background-color: #343a40!important;
}
</style>

</head>

<body class="bg-dark">
	<!-- header -->
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                       <h3>NHÀ HÀNG SEAFOOD</h3>
                    </a>
                </div>
                <div class="login-form">
                   <form action="" method="post">
                   @csrf
                        <div class="form-group">
                            <label>Địa chỉ email</label>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email">
                        </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" name="remember"> Nhớ mật khẩu
                            </label>
                                    <label class="pull-right">
                                <a href="#">Quên mật khẩu?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Đăng Nhập</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Không có tài khoản? <a href="#"> Đăng ký tại đây!</a></p>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




	@include('pages.js')
	
</body>

</html>