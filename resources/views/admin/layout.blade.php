<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/src/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="/src/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="/src/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="/src/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="/src/vendors/jquery-1.9.1.min.js"></script>
        <script src="/src/bootstrap/js/bootstrap.min.js"></script>
    </head>
    
     <body>
        
        {!!$heder!!}
        
        <div class="container-fluid">
            <div class="row-fluid">
                
                {!!$left_column!!}
                <div class="span9" id="content">
              	  @yield('content')
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        
        <script src="/src/assets/scripts.js"></script>
        <script src="/src/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
       
        <script src="/src/assets/admin-app.js"></script>
        
        <script src="/src/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script>
        $(function() {
           
        });
        </script>
    </body>

</html>