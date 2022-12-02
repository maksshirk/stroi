<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'webdevkin');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Развернутая строевая записка Военно-космической академии имени А.Ф.Можайского </title>
    <link rel="icon" href="img/9_Fakultet.ico" /> 
    <link href='fonts/timesnewromanpsmt.ttf' rel='stylesheet' type='text/css'>
    <link href='fonts/timesnewromanps_italicmt.ttf' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen, projection" type="text/css">
    <link rel="stylesheet" href="css/font-glyphicons.css">
    <link href="css/jstree/style.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen, projection" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-editable.css" />
    <link href="css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css">  
  </head>
<body>
    <header>
    <div class="DSP">
            <h5 align="right"><br><u>Для служебного пользования</u></h5>
    </div>    
    <div class="header">
            <div class="h1-1">
                <img src="img/310years.jpg" height="200px">
            </div>
            
            <div class="h1-1">
            <h1 align="center"><b>Военно-космическая академия <br> имени А.Ф.Можайского</b>
            <br>
            </h1>
            <h2 align="center">Астрономическое время:<br> <div id="current_date_time_block2"><br><br></div></h2>
             
            
            </div>
            
            <div class="h1-1">
                <img src="img/VKS.png" height="200px">
            </div>
        </div>
    </header>
    
    <?php
      if (!isset($_COOKIE['id'])):
    ?>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#auth" style="width: 150px; margin-left: 50px;">Вход</button>
    <?php
      else:
    ?>     
      <button onclick="window.location.href = 'php/exit.php'" type="button" class="btn btn-primary" style="width: 150px; margin-left: 50px;">Выход</button>
    <?php
      endif;
    ?>          
    <?php
      if (isset($_COOKIE['Admin_ID'])):
    ?>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change_password" style="width: 350px; margin-left: 10px;">Изменить пароль подразделениям</button>
    <?php
      endif;
    ?>  
    
    <div class="modal" id="auth" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Авторизуйтесь!</h5>
          <button type="button" class="close" data-dismiss="modal" id="close" data-keyboard="false" aria-label="Close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="php/auth.php" method="post">
            <select name="login" class="form-control" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto;">
              <option selected disabled>Выберите подразделение</option>
              <?php 
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $query_categories="SELECT id, category FROM categories";
                $result_categories = $conn->query($query_categories);
                while($row=$result_categories->fetch_assoc()) { ?>
                <option value=<?php echo $row['id']?>><?php echo $row['category']?></option>
                
              <?php } $conn ->close();?>
            </select><br>
            <input type="password" class="form-control" name="password"
            id="password" placeholder="Введите пароль" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto;"><br>
            <button class="btn btn-success" type="submit" style="margin-left: auto; margin-right: auto;">Войти</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
    </div>
    
    <div class="modal" id="change_password" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Выберите подразделение и введите новый пароль!</h5>
          <button type="button" class="close" data-dismiss="modal" id="close" data-keyboard="false" aria-label="Close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="php/change_password.php" method="post">
            <select name="login" class="form-control" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto;">
              <option selected disabled>Выберите подразделение</option>
              <?php 
                $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $query_categories="SELECT id, category FROM categories";
                $result_categories = $conn->query($query_categories);
                while($row=$result_categories->fetch_assoc()) { ?>
                <option value=<?php echo $row['id']?>><?php echo $row['category']?></option>
                
              <?php } $conn ->close();?>
            </select><br>
            <input type="password" class="form-control" name="password"
            id="password_change_user" placeholder="Введите пароль" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto;"><br>
            <button class="btn btn-success" type="submit" style="margin-left: auto; margin-right: auto;">Изменить пароль</button>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
    </div>

    <div id="body">
        <div id="categories" class="column">
            <?php
              if (isset($_COOKIE['id'])):
            ?>
            <img src="img/loading.gif" />
            <?php
              endif;
            ?>
        </div>
        <!-- Табличка с расходом и отсутствующими -->
        <div id="goods"  class="column">

        </div>
    </div>
    
    <br>
    <br>
    <br>
    <footer class="section footer-classic context-dark bg-image" style="background: #ffffff;">
        
          <div id="footer" class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.php"><img class="brand-logo-light" src="img/9_Fakultet.ico" alt=""  height="70" srcset="img/9_Fakultet.ico 2x"></a>
                <p>Сервис разработан только для использования внутри академии. </p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2022.</span><span> </span><span>9 факультет АСУ (войсками)</span><span>. </span><span>Все права защищены.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Контакты</h5>
              <dl class="contact-list">
                <dt>Разработчик:</dt>
                <dd>Старший лейтенант Широкопетлев Максим Сергеевич, курсовой офицер - преподаватель 9 факультета</dd>
              </dl>
              <dl class="contact-list">
                <dt>E-mail:</dt>
                <dd><a href="mailto:shirokopetlev_ms@vka.loc">shirokopetlev_ms@vka.loc</a></dd>
                <dd><a href="mailto:maxim@shirokopetlev.ru">maxim@shirokopetlev.ru</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>Телефон:</dt>
                <dd><a href="tel:+7 (911) 170-18-75">+7 (911) 170-18-75</a>
                <dd><a href="tel:+7 (999) 523-53-97">+7 (999) 523-53-97</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Ссылки на проекты академии</h5>
              <ul class="nav-list">
                <li><a href="http://portal.vka">Портал академии</a></li>
                <li><a href="http://192.168.0.208">Софт академии</a></li>
                <li><a href="https://email.vka.loc">Почта Outlook</a></li>
                <li><a href="https://192.168.0.17">Почта Zimbra</a></li>
              </ul>
            </div>
          </div>
        
      </footer>



    <script type="text/javascript">
        var  months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
        var d = new Date();
        var monthName=months[d.getMonth()];
        
        var time = setInterval(function() {
        var date = new Date();
        document.getElementById("current_date_time_block2").innerHTML = (date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear() + " г. <br>" + date.getHours() + ":" + ('0'+ date.getMinutes()).slice(-2) + ":" + date.getSeconds());
        }, 1000);
        setInterval(function() {
        location.reload();
        }, 600000);
    </script>    
    
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jstree.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-ru.js" type="text/javascript"></script>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-editable.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/cookie.js" type="text/javascript"></script>

</body>
</html>