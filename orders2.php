<?php
    $nameClient = @trim(stripslashes($_POST['nameClient']));
    $numberPhone = @trim(stripslashes($_POST['numberPhone']));
    $address = @trim(stripslashes($_POST['address']));
	$nameService = @trim(stripslashes($_POST['nameService']));
    $numCars = @trim(stripslashes($_POST['numCars']));
            
    setcookie("nameClient", $nameClient, time() + 3600 * 24);
    setcookie("numberPhone", $numberPhone, time() + 3600 * 24);
    setcookie("address", $address, time() + 3600 * 24);
    setcookie("nameService", $nameService, time() + 3600 * 24);
    setcookie("numCars", $numCars, time() + 3600 * 24);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Заказ | PenzaBus</title>
    
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
    
            
                
    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2><br>Сделать заказ</h2>
            </div>
    
            
             <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="makeAnOrder.php">
                    
                    <div class="col-sm-5 col-sm-offset-1">
                        <?php
                        
                        require_once 'connection.php'; 
                        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                        
                        for ($i = 0; $i < $numCars; $i++){ 
                            mysqli_select_db($link, "penzabus");
                            $data = mysqli_query($link, "SELECT * FROM `carPark`"); ?> 
                        
                            <div class="form-group">
                                <label>Машина</label><br>
                                <select name="car_$i">
                                    <?php
			                         while($row = mysqli_fetch_assoc($data)){
                                        echo "<option value='{$row['name']}'>", $row['name'], "</option>"; 
                                    } 
                                    ?>
                                </select>
                            </div>
                         <?php   
                                     } 
                         
                        ?>
                    </div>
                    
                   
                    
                    <div class="col-sm-5">
                       
                        <div class="form-group">
                            <label>Дата отправления *</label>
                            <input  name="date"  type="date" class="form-control"  required/>
                        </div>  
                                
                        <div class="form-group">
                            <label>Длительность аренды транспорта, дни *</label>
                            <input  name="time"  class="form-control" value="1" type="number" required/>
                        </div>  
                        
                        <div class="form-group">
                            <label>Удобное время для звонка *</label>
                            <input  name="timeToCall"  class="form-control" type="number_format" 
                                   pattern="^([0-1]\d|2[0-3])(:[0-5]\d)$" title="Время в формате HH:MM" required/>
                        </div>
                        <div class="form-group">
                             <input type="submit" value="Продолжить" name="Отправить заявку" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                   
                </form> 
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