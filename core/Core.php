<?php

class Core
{

    protected $controller = 'ArticlesController';
    protected $currentMethod = 'readAll';


    public function __construct()
    {
        $url = $this->getUrl();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['create'])) {
                $this->currentMethod = 'create';
                echo $this->currentMethod;
            }
            if (isset($_POST['delete'])){
                $this->currentMethod ='delete';
            }
            if(isset($_POST['update'])){
                $this->currentMethod = 'update';
            }
            
        }
        // Look in controllers for first value
       /* if (file_exists('controllers/' . ucwords($url[0]) . '.php')) {
            echo 'tttttttttttttt';

            // If exists, set as controller
            $this->controller = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }*/
        require_once 'db/DbAccess.php';
        // Require the controller
        require_once 'controllers/' . $this->controller . '.php';
        // Instantiate controller class
        $this->controller = new $this->controller;

       /* if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }*/
      
       
        // Get params
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->currentMethod], $this->params);
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
