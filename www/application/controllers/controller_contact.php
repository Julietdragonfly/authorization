<?php


class controller_contact extends controller {
    function __construct() {
        $this->model = new model_contact();
        $this->view = new view();
    }

    function action_index() {
        if ($data = $this->model->get_data())
            $this->view->generate('contact_view.php',$this->template_view,$this->model->get_data());
        else
            $this->redirect('');
    }
}