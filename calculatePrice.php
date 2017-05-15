<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Цены | PenzaBus</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
     
  
</head>
<body>
   <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i> +79991101973</p></div>
                    </div>
                     <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="http://facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container"> 
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">PenzaBus</a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Главная</a></li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Автопарк<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="autobus.php">Автобусы</a></li>
                                <li><a href="miniautobus.php">Микроавтобусы</a></li>
                            </ul>
                        </li>
                        <li><a href="pricing.php">Услуги</a></li>
                        <li><a href="services.php">Цены</a></li>
                        <li><a href="contact-us.html">Контакты</a></li>                        
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>
    
    <section id="feature" class="transparent-bg">
        <div class="container">
          
                 
        <?php
	
           require_once 'connection.php'; 
           $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
  
	       mysqli_select_db($link, "PenzaBus");
		

	       $nameService = @trim(stripslashes($_POST['nameService']));
	       $time = @trim(stripslashes($_POST['time']));
           $car = @trim(stripslashes($_POST['car']));
           $numCars = @trim(stripslashes($_POST['numCars']));

            
            $data = mysqli_query($link, "SELECT * FROM `services`");
            while($row = mysqli_fetch_assoc($data)){
                if ($row["name"] == "$nameService") {
                    $priceSevice = $row["price"];
                }
            }
            
            $data2 = mysqli_query($link, "SELECT * FROM `carPark`");
            while($row = mysqli_fetch_assoc($data2)){
                if ($row["name"] == "$car") {
                    $priceCar = $row["price"];
                } 
            }

            $priceOrder = ($priceSevice + $priceCar * $numCars) * $time;
            
            mysqli_close($link);
    
            ?> 
              
            
            <div class="center wow fadeInDown">
                <p align="right"><a href='orders.php' class='btn btn-primary'>Оставить заявку</a></p> 
                <br><h2>Приблизетельная стоимость вашего заказа: </h2>  
                <p class="lead">по городу - <?php echo $priceOrder?> рублей,
                    &nbsp; &nbsp; &nbsp; &nbsp; по области - <?php echo round($priceOrder - $priceOrder / 6) ?> рублей</p>
            <p align="center"><img src="images/penza.jpg"></p>
            </div>
             
        </div>
    </section>

   
     <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">PenzaBus &copy; 2017 <a target="_blank"></a>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.html">Главная</a></li>
                        <li><a href="services.php">Цены</a></li>
                        <li><a href="contact-us.html">Связаться с нами</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>