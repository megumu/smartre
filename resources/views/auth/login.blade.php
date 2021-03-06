<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン画面</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        *{
            font-family: "メイリオ";
        }
        body {
            padding-top: 30px;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">forecast</a>
            </div>
            <div class="navbar-collapse collapse navbar-right">
                <a class="navbar-brand" href="/auth/logout">Logout</a>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">


        <!-- title -->
        <div class="page-header">
            <h2>
            <span class="glyphicon glyphicon-user"></span>
            ログイン画面
            </h2>
        </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        <!-- form -->
        <div>
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <form action="/auth/login" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="ref_date" class="col-xs-2">メールアドレス</label>
                            <div class="col-xs-4">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ref_date" class="col-xs-2">パスワード</label>
                            <div class="col-xs-4">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <input type="checkbox" name="remember"> Remember Me
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-4">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <button type="submit" class="btn btn-success">ログイン</button>
                            </div>
                        </div>
                    </form>
<!--
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <div>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" name="password" id="password">
                </div>

                <div>
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
-->
        </div>

    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
$(function(){
    $('.action-update').on('click', function(){
        $(this).parents('tr').hide().next().next().removeClass('hidden').show();
    });
    $('.action-delete').on('click', function(){
        $(this).parents('tr').hide().prev().prev().show();
    });
});
</script>
</body>
</html>
