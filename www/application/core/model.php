<?php

require_once __DIR__ . '/database.php';
class model
{
    protected $db;


    function __construct()
    {
        $this->db = new database;
    }


    public function get_data()
    {

    }

    public function get_id()
    {
        if ($get_start = strripos($_SERVER['REQUEST_URI'], '?'))
            $clear_uri = substr($_SERVER['REQUEST_URI'], 0, $get_start);
        else
          $clear_uri = $_SERVER['REQUEST_URI'];

        $routes = explode('/', $clear_uri);
        if (isset($routes[3])) {

            $result = intval($routes[3]);
            return $result;

        } else
            return -1;
    }
    protected function get_id_order()
    {
        if ($get_start = strripos($_SERVER['REQUEST_URI'],'?'))
            $clear_uri = substr($_SERVER['REQUEST_URI'],0,$get_start);
        else
            $clear_uri = $_SERVER['REQUEST_URI'];
        $routes = explode('/', $clear_uri);
        if (isset($routes[3]))
            if ($routes[3]) {
                $result = array();
                $result[0] = intval($routes[3]);
                $result[1] = $this->db->real_escape($routes[3]);
                return $result;
            }
            else
                return false;
        else
            return false;
    }
    public function get_id_del()
    {
        if ($get_start = strripos($_SERVER['REQUEST_URI'], '?'))
            $clear_uri = substr($_SERVER['REQUEST_URI'], 0, $get_start);
        else
            $clear_uri = $_SERVER['REQUEST_URI'];

        $routes = explode('/', $clear_uri);
        if (isset($routes[3])) {
            return $result=$routes[3];

        } else
            return -1;
    }
    public function generate_code(){ //запускаем функцию, генерирующую код
        $hours = date("H");
        $minuts = substr(date("H"), 0 , 1);
        $mouns = date("m");
        $year_day = date("z");
        $str = $hours . $minuts . $mouns .$year_day; //создаем строку
        $str = md5(md5($str));
        $str = strrev($str);// реверс строки
        $str = substr($str, 3, 6); // извлекаем 6 символов,    начиная с 3

        $array_mix = preg_split('//',    $str, -1, PREG_SPLIT_NO_EMPTY);
        srand ((float)microtime()*1000000);
        shuffle ($array_mix);
        // перемешиваем
        return implode("",    $array_mix);
    }

    public function chec_code($code){ //проверяем код
        $code = trim($code);//удаляем пробелы
        $array_mix = preg_split ('//',    $this->generate_code(), -1, PREG_SPLIT_NO_EMPTY);
        $m_code = preg_split ('//', $code, -1,    PREG_SPLIT_NO_EMPTY);
        $result = array_intersect ($array_mix,    $m_code);
        if (strlen($this->generate_code())!=strlen($code))
        { return    FALSE;}
        if (sizeof($result) == sizeof($array_mix))
        { return TRUE;}
        else
        { return FALSE;}
    }



}