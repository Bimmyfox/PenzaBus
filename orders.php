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
    
            <?php
            require_once 'connection.php'; 
            $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
  
            $data = mysqli_query($link, "SELECT * FROM `carPark`");
            $data2 = mysqli_query($link, "SELECT * FROM `services`");

            ?>
    
             <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="orders2.php">
                    
                    <div class="col-sm-5 col-sm-offset-1">
                        
                        <div class="form-group">
                            <label>Имя *</label>
					        <input name = "nameClient" type="text" class="form-control" required="required" pattern="[А-Яа-яЁё]+" title="Имя должно состоять из русских букв" required/>
                        </div>
                       
                        <div class="form-group">
                            <label>Номер телефона *</label>
                            <input name="numberPhone"  class="form-control" type="number_format" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" title="Неправильный ввод номера телефона" required/>

                        </div>  
                        
                        <div class="form-group">
                            <label>Адрес отправления *</label> 
                            <input name = "address" type="text" class="form-control" required="required" required/>
                        </div>
                        
                        
                        
                          
                                              
                    </div>
                    <div class="col-sm-5">
                         
                     
                        
                        <div class="form-group">
                            <label>Услуга</label>
                            <br><select name="nameService">
                                <?php
			                  while($row = mysqli_fetch_assoc($data2)){
                                  echo "<option value='{$row['name']}'>", $row['name'], "</option>"; 
                              }  ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Количество машин</label><br>
                            <input  name="numCars" value="1" class="form-control" type="number">
                        </div>

                                
                        
                        <div class="form-group">
                             <input type="submit" value="Продолжить" name="Отправить заявку" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->

    
              
     
             
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