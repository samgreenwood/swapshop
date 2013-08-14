<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- For sample logo only-->
    <!--Remove if you no longer need this font-->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Aguafina+Script">
    <!--For sample logo only-->

    <link rel="stylesheet" type="text/css" href="/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.css">
    <script src="/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="/javascripts/site.js" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="/stylesheets/theme.css">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

      <!-- Le fav and touch icons -->
      <link rel="shortcut icon" href="../assets/ico/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
      <!--<![endif]-->

      <div class="row-fluid login">

        <div class="dialog">

            <p class="brand" href="/">Air-Stream<br />Swapshop.</p>
            <div class="block">
                <div class="block-header">
                    <h2>Sign Up</h2>
                </div>
                <form action="/users" method="POST">
                    <label>Email Address</label>
                    <input type="email" class="span12" name="username">
                    <label>Password</label>
                    <input type="password" class="span12" name="password">
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success pull-right" value="Sign Up"></a>
                        <a href="/login" class="sign-up">Sign In</a>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            @foreach($errors->all() as $error)
            <div class="alert alert-error fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Error</strong> {{$error}}
            </div>
            @endforeach
        </div>
    </div>



    
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
    </script>
    
</body>
</html>


