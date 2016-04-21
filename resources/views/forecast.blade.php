<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smartre 分析予測登録画面</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

<link rel="stylesheet" type="text/css" href="datepicker/css/bootstrap-datepicker.min.css">
<script type="text/javascript" src="datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!--
<link href="/css/app.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 -->


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
        <div class="page-header">
            <h2>
            <span class="glyphicon glyphicon-user"></span>
            Smartre 分析予測登録画面
            </h2>
        </div>


<!--
<script type="text/javascript">
    $(function () {
    	$('#mydate').datepicker();
    });
</script>

<div class="form-group">
    <label for="mydate">日付：</label>
    <input type="text" class="form-control" id="mydate">
</div>

<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
-->





        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <form action="/forecast/create" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="ref_date" class="col-xs-2">対象日</label>
                        <div class="col-xs-4">
                            <input type="text" name="ref_date" id="ref_date" class="form-control">
                            (yyyy/mm/dd e.g.2015/07/04)
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-xs-2">銘柄コード</label>
                        <div class="col-xs-4">
                            <input type="text" name="code" id="code" class="form-control">
                            (N225mini)
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="strategy" class="col-xs-2">戦略</label>
                        <div class="col-xs-4">
                            <input type="text" name="strategy" id="strategy" class="form-control">
                            (SA, SB)
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="forecast" class="col-xs-2">予測</label>
                        <div class="col-xs-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" name="forecast" id="forecast" class="form-control">
                                    (-3, -2, -1, 0, 1, 2, 3)
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="forecast" class="col-xs-2">枚数</label>
                        <div class="col-xs-10">
                            <div class="row">
                                <div class="col-xs-2">
                                    <input type="text" name="unit" id="unit" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                -->
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
                        <!--
                        <th>#</th>
                    -->
                        <th>対象日</th>
                        <th>銘柄コード</th>
                        <th>戦略</th>
                        <th>予測</th>
                        <!--
                        <th>枚数</th>
                    -->
                    </thead>
                    <tbody>

@foreach ($forecasts as $forecast)
<tr>
                            <td>
                            <button type="button" class="btn btn-info action-update">編集</button>
                            </td>
                            <td>
                            <form action="/forecast/delete" method="post">
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="id" value="{{{$forecast->id}}}">
                                <button type="submit" class="btn btn-default">削除</button>
                            </form>
                            </td>
                        <!--
                            <td>{{{$forecast->id}}}</td>
                    -->
                            <td>{{{$forecast->ref_date}}}</td>
                            <td>{{{$forecast->code}}}</td>
                            <td>{{{$forecast->strategy}}}</td>
                            <td>{{{$forecast->forecast}}}</td>
                        <!--
                            <td>{{{$forecast->unit}}}</td>
                        -->
                        </tr>
                        <form action="/forecast/update" method="post">
                        <tr class="hidden">
                            <td>
                                <button type="button" class="btn btn-info action-delete">キャンセル</button>
                            </td>
                            <td>
								<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="hidden" name="id" value="{{{$forecast->id}}}">
                                <button type="submit" class="btn btn-warning">登録</button>
                            </td>
<!--
                            <td>{{{$forecast->id}}}</td>
-->
                            <td><input type="text" class="form-control" name="ref_date" value="{{{$forecast->ref_date}}}"></td>
                            <td><input type="text" class="form-control" name="code" value="{{{$forecast->code}}}"></td>
                            <td><input type="text" class="form-control" name="strategy" value="{{{$forecast->strategy}}}"></td>
                            <td><input type="text" class="form-control" name="forecast" value="{{{$forecast->forecast}}}"></td>
<!--
                            <td>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" name="forecast" value="{{{$forecast->forecast}}}">
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="unit" value="{{{$forecast->unit}}}">
                                    </div>
                                </div>
                            </td>
-->
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
