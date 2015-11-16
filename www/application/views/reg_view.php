<h2 class="text-success text-center text_sere" id="formSucss" style="display:none;"> Вы успешно зарегистрировались</h2>
<div class="form-signin form_reg"  id="form" style="display:yes">

    <h2 class="form-signin-heading text-center">Регистрация</h2>
    <p class="text-warning text-center"> Все поля обязательны для заполнения</p>
    <p class="text-danger text-center" id="full_inp"></p>
    <label class="control-label" for="name">Имя</label>
    <input type="text" class="input-block-level"  name="name" id="name" required>
    <label class="control-label" for="surname">Фамилия</label>
    <input type="text" class="input-block-level"  name="surname" id="surname" required>
    <label class="control-label" for="login">Login <span id="error_login" class="text-danger text_small"></label>
    <input type="text" class="input-block-level"  name="login" id="login" required>
    <label class="control-label" for="pass">Пароль <span id="error_pass" class="text-danger text_small"></span></label>
    <input type="password" class="input-block-level" name="pass" id="pass" required>
    <label class="control-label" for="email">Email</label>
    <input type="email" class="input-block-level" name="email" id="email" required>
    <label class="control-label" for="birth_date">Дата рождения</label>
    <input type="date" class="input-block-level" name="birth_date" id="birth_date" required>
    <label class="control-label" for="phone">Телефон <span id="error_phone" class="text-danger text_small"></span></label>
    <input type="text" class="input-block-level" placeholder="xxx-xxxxxxx" name="phone" id="phone"  required>
    <label class="control-label" for="code">Введите текст с картинки <span id="error_code" class="text-danger text_small"></span></label>
    <label class="control-label" style="display: block"> <img src="<?php echo Href::a('code/my_codegen.php'); ?>"></label>
    <input type="text" class="input-block-level" type="text" name="code"  id="code"  required>


    <button class="btn btn-large btn-success btn_reg" >Регистарция</button>

</div>

<script type="text/javascript">
    $(document).ready(function() {

        function changeVisibility(divId, visible){
            document.getElementById(divId).style.display = visible ? "none": "block";
        }
        $('.btn_reg').click(function () {

            var name = $('input#name').val();
            var surname = $('input#surname').val();
            var login = $('input#login').val();
            var pass = $('input#pass').val();
            var birth_date = $('input#birth_date').val();
            var phone = $('input#phone').val();
            var email = $('input#email').val();
            var code = $('input#code').val();
            if (name == "" || surname == "" || login == "" || pass == "" || birth_date == "" || phone == "" || email == "" || code == "" ){
                $("#full_inp").text("Вы не заполнили все поля").show().delay(3000).fadeOut(300);
            }else{
                if (pass.length<=5 || pass.length > 17) {
                    $("#error_pass").text(" должен состоять из не менее 6 и не более 16 символов").delay(3000).fadeOut(300);
                     $("#pass").addClass("error").show();
                    $("#pass").delay(5000).removeClass("error").addClass("der").show();
                }
                else {
                    if (!(/\d{3}-\d{7}/.test(phone))){
                        $("#error_phone").text(" неверный формат").delay(3000).fadeOut(300);
                        //$("#phone").addClass("error").show();
                        //$("#phone").addClass("error").show();
                    }else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Href::a("user/reg");?>',
                        data: {name: name,surname: surname, login: login, pass:pass, email:email,birth_date: birth_date, phone:phone, code:code },
                        success: function (data) {
                            if (data == 555){
                                changeVisibility('form',1);
                                changeVisibility('formSucss',0);
                            }else {
                                if (data== 666){
                                    $("#error_login").text("Такой пользователь уже существует").delay(5000).fadeOut(500);
                                }else {
                                    if(data = 444) {
                                        $("#error_code").text("Вы неверно ввесли код с картинки").delay(3000).fadeOut(500);
                                    }
                                }
                            }

                        }
                    })
                    }
                }
            }
        })

    })
</script>