<?php

namespace Core;

class Router
{

    public Request $request;
    protected array $routes = [];
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function psot($path, $callback)
    {
        $this->routes['psot'][$path] = $callback;
    }

    public function resolve()
    {
        $url = $this->request->request_path();
        $method = $this->request->request_method();
        $callback = $this->routes[$method][$url] ?? false;
        if ($callback === false) {
            echo "Not Found 404";
            exit;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->conteroller = new $callback[0];
            $callback[0] = Application::$app->conteroller;
        }
        return call_user_func($callback,$this->request);
    }


    public function renderView($view,$params=[])
    {
        $contentlayout = $this->renderLayout();
        $contetnView = $this->renderOnlyView($view,$params);
        return str_replace("{{content}}", $contetnView, $contentlayout);
    }

    private function renderLayout()
    {

        if (!isset(Application::$app->conteroller->layout)) {
            $layout = 'main';
        } else {
            $layout = Application::$app->conteroller->layout;
        }
        ob_start();
        require Application::$ROOT_PARH . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    private function renderOnlyView($view,$params)
    {
        foreach($params as $key=>$value){
            //pass value with key to view(html)
            $$key=$value;
        }

        ob_start();
        require Application::$ROOT_PARH . "/views/$view.php";
        return ob_get_clean();
    }
}
