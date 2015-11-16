<?php
/**
 * Created by PhpStorm.
 * User: Juliett
 * Date: 09.08.2015
 * Time: 16:38
 */

class model_404 extends model {
    public function get_data(){

        $data = array();
        $data['seo'] = $this->get_seo();
        $data['seo']['title'] = "Страница не найдена";
        $data['pages'] = $this->get_pages();
        $data['categories'] = $this->get_categories();
        $data['countries'] = $this->get_countries();
        return ($data);

    }
}