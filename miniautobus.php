<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Микроавтобусы | PenzaBus</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
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

    <section class="pricing-page">

                <div class="row">
                    
               <?php
                    
                    require_once 'connection.php'; 
                    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                    $data = mysqli_query($link, "SELECT * FROM `id1489014_penzabus`.`carPark` WHERE `type` = 'микроавтобус'");

                     while($row = mysqli_fetch_assoc($data)){
                            
                        ?> 
                         <div class="col-sm-4 plan price-one wow fadeInDown">
                        <ul>
                            <?php
                            echo "<strong>{$row["name"]} </strong>";
                            echo "<img src ='/images/miniautobus/{$row['img']}'>";
                            echo "<br><strong>цвет:</strong> {$row["color"]} <br>";
                            echo "<strong>салон:</strong> {$row["salon"]} <br>";
					        echo "<strong>вместимость:</strong> {$row["spaciousness"]} <br>";
					        echo "<strong>цена:</strong> {$row["price"]} руб./час";
                            ?>
                        </ul>
                        </div>
                    <?php

			         }
                    
            mysqli_close($link);
    
            ?>
                
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