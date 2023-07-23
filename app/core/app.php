<?php
class App {
    protected $controller = '_404';
    protected $method = 'index';
    function __construct()
    {
        $arr = $this->getURL();

        $fileName = "../app/controllers/".ucfirst($arr[0]).".php";
        if(file_exists($fileName))
        {
            require $fileName;
            $this->controller = $arr[0];
            unset($arr[0]);
        } else {
            require "../app/controllers/".$this->controller.".php";
        }

        $myController = new $this->controller();
        $myMethod = $arr[1] ?? $this->method;
        if(!empty($arr[1]))
        {
            if(method_exists($myController, strtolower($myMethod)))
            {
                $this->method = strtolower($myMethod);
            }
        }

        $arr = array_values($arr);
        call_user_func_array([$myController, $this->method], $arr);
    }

    private function getURL()
    {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    }
}
