<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>analysis</title>
    
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
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">active</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
 
    <div class="container">
        <div class="page-header">
            <h2>
            <span class="glyphicon glyphicon-user"></span>
            analysis
            </h2>
        </div>
        


<script type="text/javascript">
    $(function () {
    	$('#mydate').datepicker();
    });
</script>

<div class="form-group">
   ret_val: {{$ret_val}}
   ref_date: {{$ref_date}}
   code: {{$code}}
   strategy: {{$strategy}}
   unique_parameter: {{$unique_parameter}}
</div>


 
        <hr>
 
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