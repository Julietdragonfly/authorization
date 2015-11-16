<?php


class model_user extends model {
    function get_data() {
        $data = array();
        $data['menu'] = 3165;
        $data['seo']['title'] = "Авторизация";
        return $data;
    }
    function get_user() {
        $data = array();
        $data['menu'] = 4513;
        $data['seo']['title'] = "Личный кабинет";
        return $data;
    }

    function login() {
        extract($this->db->real_escape_array($_POST));
        $pass = md5($pass);
        $this->db->query("SELECT * FROM users WHERE login='$login' AND  pass='$pass'");
        if ($this->db->num_rows() == 0)
            return false;
        $_SESSION['user'] = $this->db->fetch(0);
        return true;
    }

    function register() {
        extract($this->db->real_escape_array($_POST));

        $date = date('Y-m-d H:i:s');
        $pass = md5($pass);

        $this->db->query("SELECT * FROM users WHERE login='$login'");
        if ($this->db->num_rows() != 0){
            $data=666;
        }else {
            if (!$this->chec_code($code)){
            $data=444;
            } else {
                $this->db->query("INSERT INTO users (
                                                            surname,
                                                            name,
                                                            login,
                                                            birth_date,
                                                            phone,
                                                            pass,
                                                            date_create,
                                                            email
                                                        ) VALUES (
                                                            '$surname',
                                                            '$name',
                                                            '$login',
                                                            '$birth_date',
                                                            '$phone',
                                                            '$pass',
                                                            '$date',
                                                            '$email'
                                                        )
                                    ;");
                $id = $this->db->last_id();
                $this->db->query("SELECT*FROM users WHERE id=$id;");
                $_SESSION['user'] = $this->db->fetch(0);
                $create_date = date('Y-m-d H:i');
                $message = $create_date." Вы успешно зарегестрировались ";
                mail($email, 'Успешная регистрация', $message);
                $data = 555;
            }
        }
        return $data;
    }

    function change_user() {
        extract($this->db->real_escape_array($_POST));
        if(!empty($pass)) {
            $pass = md5($pass);
        }else {
            $pass = $_SESSION['user']['pass'];
        }
        $this->db->query("UPDATE users SET
												name='$name',
												surname='$surname',
												login='$login',
												birth_date='$birth_date',
												email='$email',
												phone='$phone',
												pass='$pass'
								WHERE id='$id'
							;");
        foreach ($_FILES as $key=>$value) {
            if ($current_image = Files::upload_image($key,'people'))
                $this->db->query("UPDATE users SET img='$current_image' WHERE id=$id");
        }
        $this->db->query("SELECT*FROM users WHERE id='$id' ;");
        $_SESSION['user'] = $this->db->fetch(0);
        return true;
    }

    function delete() {
        $data = array();
        $data['del'] = 4513;
        $data['seo']['title'] = "Удаление пользователя";
        $this->db->query("DELETE FROM users WHERE id=".$_SESSION['user']['id'].";");

        return $data;
    }
}