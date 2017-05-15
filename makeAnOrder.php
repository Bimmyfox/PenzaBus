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
          

            <div class="center wow fadeInDown">
               <br><br> <h2> <?php echo $_COOKIE['nameClient']; ?>, благодарим за заказ! <br><br> Ожидайте звонка в указанное время. </h2><br>
            <p class="lead"></p>
            </div>

        <?php 
            
            require_once 'connection.php'; 
            $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
            
            $nameClient = $_COOKIE['nameClient'];
            $numberPhone = $_COOKIE['numberPhone'];
            $address = $_COOKIE['address'];
            $nameService = $_COOKIE['nameService'];
            $numCars = $_COOKIE['numCars'];
            $car = array();
            for ($i = 0; $i < $numCars; $i++){ 
                $car[] = $_POST['car_$i'];
            }
            $cars = implode($car);
            $date = $_POST['date'];
            $time = $_POST['time'];
            $timeToCall = $_POST['timeToCall'];
                    
            $res = mysqli_query($link, "INSERT INTO `PenzaBus`.`orders` 
                (`nameClient`, `numberPhone`, `address`, `nameService`, `numCars`, `cars`, `date`, `time`, `timeToCall`) 
                VALUES ('$nameClient', '$numberPhone', '$address', '$nameService', '$numCars', '$cars', '$date', '$time', '$timeToCall' )") 
                or die ("Ошибки запроса: " . mysql_error());
            
            mysqli_close($link);
            
        ?>
            
<br><br><br><br>
             
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