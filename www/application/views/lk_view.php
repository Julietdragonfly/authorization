<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Личный кабинет
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Href::a('');?>">Главная</a>
            </li>
            <li class="active">Личный кабинет</li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!-- Intro Content -->
<div class="row">
    <?php if($data['del'] == 4513){?>
        <h3>Пользователь успешно удалён</h3>
    <?php } else{?>

    <div class=" col-md-offset-4 col-md-4 text-center">
        <div class="table-responsive">
            <?php
            if ($_SESSION['user']['img'] == 1){
                $image = 'no_photo.png';
            } else {
                $image = $_SESSION['user']['img'];
            }
            ?>
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <td>Фамилия</td>
                    <td><?php echo $_SESSION['user']['surname']?></td>
                </tr>
                <tr>
                    <td>Имя</td>
                    <td><?php echo $_SESSION['user']['name']?></td>
                </tr>
                <tr>
                    <td>Логин</td>
                    <td><?php echo $_SESSION['user']['login']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION['user']['email']?></td>
                </tr>
                <tr>
                    <td>Дата рождения</td>
                    <td><?php echo $_SESSION['user']['birth_date']?></td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td><?php echo $_SESSION['user']['phone']?></td>
                </tr>
                <tr>
                    <td>Дата регистрации</td>
                    <td><?php echo $_SESSION['user']['date_create']?></td>
                </tr>
                <tr>
                    <td>Фото профиля</td>
                    <td><img class="photo_profile" src="<?php echo Href::a('img/people/'.$image)?>"></td>
                </tr>
            </table>
            <a href="<?php echo Href::a('user')?>" class="btn btn-success btn_edit">Редактировать профиль</a><br>
            <a href="<?php echo Href::a('user/delete')?>" class="btn btn-success margin_top" onclick="return confirm('Подтвердите удаление');">Удалить  профиль</a>
        </div>
    </div>
    <?php }?>
</div>