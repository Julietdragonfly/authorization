<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" >
    <meta name="keywords" >
    <meta name="author" content="">
    <title><?php echo $data['seo']['title'];?></title>

    <?php
        echo Href::script('jquery.js');
        echo Href::script('fileinput.js');
        echo Href::script('fileinput_locale_ru.js');
    ?>
    <!-- Custom CSS -->
    <?php
        echo Href::css('bootstrap.min.css');
        echo Href::css('fileinput.css');
        echo Href::css('pro.css');
    ?>

</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Href::a('');?>">Test</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($data['menu']==3126?'active':'');?>"><a href="<?php echo Href::a('');?>">Главная</a></li>
                <li class="<?php echo ($data['menu']==4125?'active':'');?>"><a href="<?php echo Href::a('contact');?>">Контакты</a></li>
                <?php if (empty($_SESSION['user'])){?>
                    <li class="<?php echo ($data['menu']==3165?'active':'');?>"><a href="<?php echo Href::a('user/login');?>">Войти</a></li>
                <?php } else {?>
                    <li class="<?php echo ($data['menu']==4513?'active':'');?>"><a href="<?php echo Href::a('user/lk');?>">Личный кабинет</a></li>
                    <li><a href="<?php echo Href::a('user/exit');?>">Выйти</a></li>
                <?php }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!empty($_SESSION['user'])){?>
                    <li><a><?php
                            if ($_SESSION['user']['img'] == 1){
                                $image = 'no_photo.png';
                            } else {
                                $image = $_SESSION['user']['img'];
                            }
                            $surname = $_SESSION['user']['surname'];

                            echo $_SESSION['user']['name']." ".substr($surname,0,2).".";?></a></li>
                    <li><img class="img-circle nav_avatar" src="<?php echo Href::a('img/people/'.$image);?>"></li>
                <?php } ?>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <?php include 'application/views/'.$content_view;?>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>



<?php
    echo Href::script('bootstrap.min.js');
?>

</body>
</html>