<?php
class App{
    private $__controller, $__action, $__params, $__route;

    function __construct() {
        global $routes;

        $this->__route = new Route();
        $this->__controller = $routes['default_controller'];
        $this->__action = 'index';
        $this->__params = [];

        $this->handleUrl();
    }

    function getUrl()
    {
        if(!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        }
        else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl() {
        $url = $this->getUrl();

        $url = $this->__route->handleRoute($url);

        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);

        $urlCheck = '';
        // Xử lý trường hợp trang controller nằm trong folder khác
        foreach ($urlArr as $key=>$item) {
            $urlCheck.=$item.'/';
            $fileCheck = rtrim($urlCheck, '/');
            $fileArr = explode('/', $fileCheck);
            $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr) -1]);
            $fileCheck = implode('/', $fileArr);

            if(!empty($urlArr[$key - 1])) {
                unset($urlArr[$key - 1]);
            }

            if(file_exists('app/controllers/'.($fileCheck).'.php')) {
                $urlCheck = $fileCheck;
                break;
            }
        }

        $urlArr = array_values($urlArr);

        
        // Trang mặc định
        if(empty($urlCheck)) {
            $urlCheck = $this->__controller;
        }
        
        // Xử lý controller
        if(!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        }
        else {
            $this->__controller = ucfirst($this->__controller);
        }

        if(file_exists('app/controllers/'.($urlCheck).'.php')) {
            require_once 'controllers/'.($urlCheck).'.php';
            // Kiểm tra class
            if(class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            }
            else {
                echo "Không tìm thấy class";
                $this->loadError();
            }
        }
        else {
            $this->loadError();
        }

        // Xử lý action
        if(!empty($urlArr[1])) {
            $this->__action = ucfirst($urlArr[1]);
            unset($urlArr[1]);
        }

        // Xủ lý params
        $this->__params = array_values($urlArr);
            // Kiểm tra action
        if(method_exists($this->__controller, $this->__action)) {
            call_user_func_array(array($this->__controller, $this->__action), $this->__params);
        }
        else {
            $this->loadError();
        }
    }

    public function loadError($name = '404') {
        require_once 'errors/' .$name. '.php';
    }
}