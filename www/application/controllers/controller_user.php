<?php

class controller_user Extends Controller {
    function __construct() {
        $this->view = new view();
        $this->model = new Model_user;
    }

    function action_index() {
        $this->check_logged();
        if (empty($_POST))
            $this->view->generate('edit_view.php',$this->template_view,$this->model->get_data());
        else {
            $this->model->change_user();
            $this->redirect('user?success');
        }
    }
    function action_lk() {
        $this->check_logged();
        $this->view->generate('lk_view.php',$this->template_view,$this->model->get_user());
    }

    function action_login() {
        if (empty($_POST))
            $this->view->generate('login_view.php',$this->template_view,$this->model->get_data());
        else {
            if ($this->model->login())
                $this->redirect('');
            else
                $this->redirect('user/login?error');
        }
    }

    function action_reg() {
        if (empty($_POST))
            $this->view->generate('reg_view.php',$this->template_view,$this->model->get_data());
        else {
            if ($data = $this->model->register())
                echo $data;
            else
                $this->redirect('user/registration?error');
        }
    }
    function action_delete() {
        $data = $this->model->delete();
        session_unset();
        session_destroy();
        $this->view->generate('lk_view.php',$this->template_view,$data);

    }
    function action_exit() {
        setcookie('uid','',time()-3600,'/');
        session_unset();
        session_destroy();
        $this->redirect('');
    }  
}
