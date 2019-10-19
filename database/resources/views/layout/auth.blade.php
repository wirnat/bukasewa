
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/admin/assets/css/style.css" rel="stylesheet">
    <link href="/admin/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/passtrength.css">
    <style>
    .swal2-popup {
                  font-size: 1.6rem !important;
                  }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      @yield('content');  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/admin/assets/js/jquery.js"></script>
    <script src="/admin/assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/admin/assets/js/jquery.backstretch.min.js"></script>
    <script>
         $.backstretch(
                ["/img/login.jpg"
                , "/img/login2.jpg"
                , "/img/login3.jpg"
                , "/img/login4.jpg"],{duration: 3000, fade: 750});

    </script>
    <script type="text/javascript" src="/js/jquery.passtrength.js"></script>
    @yield('footer');

  </body>
</html>
