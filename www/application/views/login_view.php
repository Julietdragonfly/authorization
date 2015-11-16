
<form class="form-signin" action="<?php echo Href::a('user/login');?>" method="POST">
    <?php if (isset($_GET['error'])) {?>
        <h4  class="text-danger text-center">Вы не правильно ввели логин или пароль</h4>
    <?php }?>
    <h2 class="form-signin-heading text-center">Авторизация</h2>
    <input type="text" class="input-block-level" placeholder="Login" name="login" id="name" required>
    <input type="password" class="input-block-level" placeholder="Password" name="pass" id="pass" required>
    <button class="btn btn-large btn-success" type="submit">Вход</button>
    <a class="btn btn-large  btn-warning btn_reg" href="<?echo Href::a('user/reg')?>">Регистрация</a>
</form>

