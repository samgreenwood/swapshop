<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Swap Shop</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />
		<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.1/yeti/bootstrap.min.css" rel="stylesheet" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.min.css" rel="stylesheet" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2-bootstrap.min.css" rel="stylesheet" />

		<script src="//code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.min.js"></script>
		
		<script src="/javascripts/site.js" type="text/javascript"></script>
		<script src="/images/holder.js" type="text/javascript"></script>
		
		</head>
	<body> 
	<div class="container">
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Swap Shop</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/listings"><i class="fa fa-shopping-cart"></i> Listings</a></li>
					<li><a href="/products"><i class="fa fa-list-ul"></i> Products</a></li>
					<li><a href="/tags"><i class="fa fa-tag"></i> Tags</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{$user['username']}} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/my-swapshop">My Swap Shop</a></li>
							<li class="divider"></li>
							<li><a href="/logout">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		@yield('content')

		<footer class="text-center">
			<hr />
			<p>
				&copy; Air-Stream Wireless 2013-2014 | <a href="http://code.sifnt.wan/dragoon/swapshop/issues/new">Report a bug or request a feature!</a>
			<p>
		</footer>
	</body>
</html>
