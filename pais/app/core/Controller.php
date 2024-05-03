<?php

class Controller {
    public function view($view, $data = []) 
    {   
        if(!isset ($_SESSION['nama_pengguna'])){
            require_once '../app/views/' . $view . '.php';
        } 
        else {
            require_once '../app/views/' . $view . '.php';
        }
        
    }

    public function model($model) 
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

}