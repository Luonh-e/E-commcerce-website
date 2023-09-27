<?php
class Home extends Controller{
    public $home_model;

    public function __construct() {
        $this->home_model = $this->model('HomeModel');
    }

    public function index() {
        $data = $this->home_model->getList();
        print_r($data);
    }
}