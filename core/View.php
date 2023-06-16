<?php

namespace Core;

class View
{
    public function renderView($view, $params = [])
    {
        $contentlayout = $this->renderLayout();
        $contetnView = $this->renderOnlyView($view, $params);
        return str_replace("{{content}}", $contetnView, $contentlayout);
    }
    private function check_layout(): string
    {
        return Application::$app->conteroller->layout ?? 'main';
    }
    private function renderLayout()
    {
        $layout = $this->check_layout();
        ob_start();
        require Application::$ROOT_PARH . "/views/layouts/$layout.php";
        return ob_get_clean();
    }
    private function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            //pass value with key to view(html)
            $$key = $value;
        }
        ob_start();
        require Application::$ROOT_PARH . "/views/$view.php";
        return ob_get_clean();
    }
}
