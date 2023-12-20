<?php

namespace app\core;

class Router {

    public array $routes = [];
    public Request $request;

    public function __construct() {
        $this->request = new Request();
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

  public function resolve() {
        $path = $this->request->path();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback) {
            http_response_code(404);
            echo $this->view('notFound', 'access', null);
            exit;
        }


        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
            return call_user_func($callback);
        }

        if(is_string($callback)) {
            echo $this->partialView($callback ,null);
        }

   }

   public function partialView($viewName, $params) {
        if($params !== null) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }

       ob_start();
       include_once __DIR__ . "/../views/$viewName.php";
       return ob_get_clean();
   }




   public function layout($layout) {
        ob_start();
        include_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();

   }

    public function view($viewName, $layout, $params) {
        $layoutContent = $this->layout($layout);
        $partialViewContent = $this->partialView($viewName, $params);
        $view = str_replace('{{ renderPartialView }}', $partialViewContent, $layoutContent);
        echo $view;
    }



}