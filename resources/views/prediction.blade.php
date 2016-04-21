<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>日経225予想バトル　予測登録画面</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="datepicker/css/bootstrap-datepicker.min.css">
<script type="text/javascript" src="datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                <a class="navbar-brand" href="#">ユーザ登録</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">メインメニュー</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
 
    <div class="container">

        <div class="page-header">
            <h2>
            <span class="glyphicon glyphicon-user"></span>
            日経225予想バトル　予想登録画面
            </h2>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <form action="/prediction/create" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="ref_date" class="col-xs-2">対象日</label>
                        <div class="col-xs-4">
<!--
                            <input type="text" name="ref_date" id="ref_date" class="form-control">
-->
                            <select name="ref_date" id="ref_date" class="form-control">
                              <option value="{{{ $today }}}">{{{ $today }}}</option>
                              <option value="{{{ $tomorrow}}}">{{{ $tomorrow }}}</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prediction" class="col-xs-2">予測</label>
                        <div class="col-xs-10">
                            <div class="row">
                                <div class="col-xs-4">
<!--
                                    <input type="text" name="prediction" id="prediction" class="form-control">
-->
                                    <select name="prediction" id="prediction" class="form-control">
                                      <option value="上昇">上昇</option>
                                      <option value="下落">下落</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-xs-2">お名前</label>
                        <div class="col-xs-4">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="strategy" class="col-xs-2">コメント</label>
                        <div class="col-xs-4">
                            <input type="text" name="comment" id="comment" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-4">
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" class="btn btn-success">登録</button>
                        </div>
                    </div>
 
                </form>
            </div>
        </div>
 
        <hr>
 
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                        <th>対象日</th>
                        <th>予想</th>
                        <th>お名前</th>
                        <th>コメント</th>
                    </thead>
                    <tbody>

@foreach ($predictions as $prediction)
                        <tr>
                            <td>
                            <button type="button" class="btn btn-info action-update">編集</button>
                            </td>
                            <td>
                            <form action="/prediction/delete" method="post">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="id" value="{{{$prediction->id}}}">
                                <button type="submit" class="btn btn-default">削除</button>
                            </form>
                            </td>
                            <td>{{{$prediction->ref_date}}}</td>
                            <td>{{{$prediction->prediction}}}</td>
                            <td>{{{$prediction->name}}}</td>
                            <td>{{{$prediction->comment}}}</td>
                        </tr>
                        <form action="/prediction/update" method="post">
                        <tr class="hidden">
                            <td>
                                <button type="button" class="btn btn-info action-delete">キャンセル</button>
                            </td>
                            <td>
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="id" value="{{{$prediction->id}}}">
                                <button type="submit" class="btn btn-warning">登録</button>
                            </td>
                            <td><input type="text" class="form-control" name="ref_date" value="{{{$prediction->ref_date}}}"></td>
                            <td><input type="text" class="form-control" name="prediction" value="{{{$prediction->prediction}}}"></td>
                            <td><input type="text" class="form-control" name="name" value="{{{$prediction->name}}}"></td>
                            <td><input type="text" class="form-control" name="comment" value="{{{$prediction->comment}}}"></td>
                        </tr>
                        </form>
@endforeach
 
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /container -->
 
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