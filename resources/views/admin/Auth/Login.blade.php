<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin2/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('admin2/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin2/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    input.form-control{
        text-align: right;
    }
    p{
        text-align: right;
    }
</style>
<body class="hold-transition login-page"style="background-size:cover;background-image: url('/admin2/dist/img/Laptop.jpg')">
<br>
<br>
<br>
<br>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>SarrdehTech</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger text-right">
                    {{\Illuminate\Support\Facades\Session::get('error')}}
                </div>
            @endif
            <p class="login-box-msg">تسجيل الدخول</p>

            <form action="{{route('admin.login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="اسم المستخدم">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('username')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin2/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin2/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
