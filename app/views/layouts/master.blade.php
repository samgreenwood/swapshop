<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Air-Stream Swapshop</title>
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="/lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.css">
  
  <script src="/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
  <script src="/javascripts/site.js" type="text/javascript"></script>
  <script src="/javascripts/select2.js" type="text/javascript"></script>
  <script src="/images/holder.js" type="text/javascript"></script>
  
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

          $.getJSON('/api/tags', function(tags){

           var selectTags = [];

           $.each(tags, function(id, tag)
           {
            selectTags.push(tag)
           });

            $('.tags').select2({
              multiple: true,
              tags: selectTags
            });
          })

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

      <div id="wrap">
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
                  <li><a href="/my-swapshop">My Swapshop</a></li>
                  <li class="divider"></li>
                  <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                  <li class="divider visible-phone"></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>

            </ul>
            <a class="brand" href="/">Air-Stream Swapshop</a>
          </div>
        </div>

        <div id="main-menu">

          <ul class="nav nav-tabs">
             <li><a href="/listings/create"><i class="icon-barcode"></i> <span>Create a Listing</span></a></li>
             <li class="dropdown">
               
            </li>
            <li style="float: right; padding-right: 20px;">
            {{Former::inline_open('/search')}}
            {{Former::text('search')->raw()}}
            {{Former::submit()->class('btn btn-primary btn-small')->value('Search')->raw()}}
            {{Former::close()}}
            </li>
          </ul>
        </div>
        
        
        <div id="sidebar-nav">

          <ul id="dashboard-menu" class="nav nav-list">
           @foreach($tags as $tag)
            @if(Str::contains(Request::url(), $tag->slug))
                <li class="active">
            @else
                <li>
            @endif
                <a href="/products/{{$tag->slug}}"><i class="icon-reorder"></i> <span>{{$tag->name}}</span></a>
                </li>
           @endforeach

          </ul>
        </div>
        
        <div class="content">
          <div class="container-fluid">
            <div class="row-fluid">
                @yield('content')
            </div>
          </div>
        </div>
        <div id="push"></div>
      </div>
      <div class="container-fluid" id="footer">
        <footer class="text-center">
          &copy; Air-Stream Wireless 2013-2014 | <a href="http://code.sifnt.wan/dragoon/swapshop/issues/new">Report a bug or request a feature!</a>
        </footer>
      </div>
      <script src="/lib/bootstrap/js/bootstrap.js"></script>
    </body>
    </html>
