<?php if (isset($_GET['success'])) {?>
    <h2  class="text-success text-center">Данные успешно изменены</h2>
<?php }?>
<form class="form-signin form_update" action="<?php echo Href::a('user');?>" method="POST" enctype="multipart/form-data">

    <h2 class="form-signin-heading text-center">Редактирование профиля</h2>
    <input type="text" name="id" value="<?php echo $_SESSION['user']['id']?>" style="display: none;" id="id_h">
    <input type="text" class="input-block-level" placeholder="Имя" name="name" id="name" value="<?php echo $_SESSION['user']['name']?>">
    <input type="text" class="input-block-level" placeholder="Фамилия" name="surname" id="surname" value="<?php echo $_SESSION['user']['surname']?>">
    <input type="text" class="input-block-level" placeholder="Login" name="login" id="login" value="<?php echo $_SESSION['user']['login']?>">
    <input type="password" class="input-block-level" placeholder="Пароль" name="pass" id="pass" >
    <input type="email" class="input-block-level" placeholder="Email" name="email" id="email" value="<?php echo $_SESSION['user']['email']?>">
    <input type="date" class="input-block-level" placeholder="Дата рождения" name="birth_date" id="birth_date" value="<?php echo $_SESSION['user']['birth_date']?>">
    <input type="text" class="input-block-level" placeholder="Телефон" name="phone" id="phone" value="<?php echo $_SESSION['user']['phone']?>">
    <label class="control-label">Изменить фото</label>
    <input type="file" id="image" name="image_1" multiple=true class="file-loading">


    <button class="btn btn-large btn-success btn_update" type="submit">Сохранить изменения</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("input#image").fileinput({
            language: 'ru',
            browseClass: "btn btn-success btn-block ",
            showCaption: false,
            showRemove: false,
            showUpload: false
        });

    })
</script>