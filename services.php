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
                        <li class="active"><a href="services.php">Цены</a></li>
                        <li><a href="contact-us.html">Контакты</a></li>                        
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>
    
    <section id="feature" class="transparent-bg">
        <div class="container">
          
            <div class="center wow fadeInDown">
                <p align="right"><a href='orders.php' class='btn btn-primary'>Оставить заявку</a></p>

            <h2>Немного о нас </h2>
            <p class="lead">Компания «PenzaBus» предлагает своим клиентам гибкую ценовую политику при заказе автобусов. <br> Стоимость аренды складывается из некоторых факторов, начиная от характера поездки, заканчивая длительностью аренды. <br> В нашей компании вы можете сделать заказ микроавтобуса или автобуса недорого и оценить все преимущества данной услуги. <br> Мы предлагаем наиболее выгодный заказ микроавтобусов в Пензе по сравнению с ценами конкурирующих компаний <br> для различных поездок, предоставляя при этом высокий уровень обслуживания, новые оборудованные микроавтобусы и <br> профессионализм водителей, прошедших строгий отбор.</p>
            </div>

            
                    <div class="container">
            
    
    
            <?php
            require_once 'connection.php'; 
            $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
  
            $data = mysqli_query($link, "SELECT * FROM `carPark`");
            $data2 = mysqli_query($link, "SELECT * FROM `services`");

            ?>
    
             <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="calculatePrice.php">
                    
                    <div class="col-sm-5 col-sm-offset-1">
                        
                        
                       
                    <div class="form-group">
                            <label>Услуга</label>
                            <br><select name="nameService">
                                <?php
			                  while($row = mysqli_fetch_assoc($data2)){
                                  echo "<option value='{$row['name']}'>", $row['name'], "</option>"; 
                              }  ?>
                            </select>
                        </div>
                        <br>
                         <div class="form-group">
                            <label>Длительность аренды транспорта, дни *</label>
                            <input  name="time" value="1" class="form-control" type="number">
                        </div> 
                                              
                    </div>
                    <div class="col-sm-5">
                         
                       
                         <div class="form-group">
                            <label>Машина/название машины дожно подходить к услуге</label><br>
                             <select name="car">
                              <?php
                                while($row = mysqli_fetch_assoc($data)){
                                 echo "<option value='{$row['name']}'>", $row['name'], ", ", $row['type'], "</option>"; 
                              } mysqli_close($link);
                              ?>

                             </select>
                        </div><br>

                        <div class="form-group">
                            <label>Количество машин *</label>
                            <input  name="numCars" value="1" type="number" class="form-control" />
                        </div>  
                                              
                        <div class="form-group">
                             <input type="submit" value="Расчитать" name="Отправить заявку" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                </form> 

     
        
     


             
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