<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Air-Stream Swapshop</title>
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
  <script src="/javascripts/select2.js" type="text/javascript"></script>
  
  <link rel="stylesheet" type="text/css" href="/stylesheets/theme.css">
  <link rel="stylesheet" type="text/css" href="/stylesheets/select2.css">
  <link rel="stylesheet" type="text/css" href="/stylesheets/style.css">

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

      <script type="text/javascript">
        $(document).ready(function()
        {
          $('select').select2();

          @yield('jquery');
        });
      </script>
    </head>

    <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
    <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
    <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
    <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> 
    <body class=""> 
      <!--<![endif]-->

      <div class="navbar">
        <div class="navbar-inner">
          <ul class="nav pull-right">

            <!-- <li class="hidden-phone"><a href="#" role="button">Settings</a></li> -->
            <li id="fat-menu" class="dropdown">
              <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-user"></i> {{$user['username']}}
                <i class="icon-caret-down"></i>
              </a>

              <ul class="dropdown-menu">
                <li>{{Html::linkAction('Swapshop\Controllers\UserController@getDashboard','My Swapshop')}}</li>
                <li class="divider"></li>
                <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                <li class="divider visible-phone"></li>
                <li>{{Html::linkAction('Swapshop\Controllers\AuthController@getLogout','Logout')}}</li>
              </ul>
            </li>

          </ul>
          <a class="brand" href="/">Air-Stream Swapshop.</a>
        </div>
      </div>

      <div id="main-menu">

        <ul class="nav nav-tabs">
          <li><a href="/"><i class="icon-dashboard"></i> <span>Shop</span></a></li>
          <li><a href="{{URL::action('Swapshop\Controllers\ProductController@getCreate')}}"><i class="icon-dashboard"></i> <span>Create a Product</span></a></li>
           <li><a href="{{URL::action('Swapshop\Controllers\ListingController@getCreate')}}"><i class="icon-dashboard"></i> <span>Create a Listing</span></a></li>
           <li class="dropdown">
             
          </li>
          <li><a href="{{URL::action('Swapshop\Controllers\UserController@getDashboard')}}" ><i class="icon-cogs"></i> <span>My SwapShop</span></a></li>
          <li style="float: right; padding-right: 20px;">
          {{Former::inline_open(URL::action('Swapshop\Controllers\SearchController@postIndex'))->style('margin-bottom: 0px; padding-top: 5px;')}}
          {{Former::text('search')}}
          {{Former::submit()->class('btn btn-primary btn-small')->value('Search')}}
          {{Former::close()}}
          </li>
        </ul>
      </div>
      
      
      <div id="sidebar-nav">

        <ul id="dashboard-menu" class="nav nav-list">
         @foreach($tags as $tag)
         <li><a href="{{URL::action('Swapshop\Controllers\TagController@getProducts', $tag['slug'])}}"><i class="icon-star"></i> <span>{{$tag['name']}}</span></a></li>
         @endforeach

        </ul>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row-fluid">
              @yield('content')
          </div>
          <footer>
            &copy; Air-Stream Wireless 2013 | <a href="http://git.sifnt.wan/dragoon/swapshop/issues/new">Report a bug or request a feature!</a>
            <hr>
          </footer>
          <script src="/lib/bootstrap/js/bootstrap.js"></script>
        </body>
        </html>
