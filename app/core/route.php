<?php
    require_once 'config.php';

    class Route
    {
        public static function start() {

            // контроллер и действие по умолчанию
            $controller_name = 'main';
            $action_name = 'index';
            $payloads = [];
            $data = '';
            // $routes = $_GET['url'];
            // $routes = explode('/', $_GET['url']);
            
            $routes = explode('/', $_SERVER['REQUEST_URI']);

            echo('<pre>');
            print_r($routes);
            echo('</pre>');
            
            // получаем имя контроллера
            if (!empty($routes[1])) {
                $controller_name = $routes[1];
            }
                    
            if(!empty($routes[2])) {
                $data = $routes[2];
            }
            // echo $data;
                    
            // добавляем префиксы
            $model_name = 'model_'.$controller_name;
            $controller_name = 'controller_'.$controller_name;
            $action_name = 'action_'.$action_name;

            echo "Model: $model_name <br>";
            echo "Controller: $controller_name <br>";
            echo "Action: $action_name <br>";

            // подцепляем файл с классом модели (файла модели может и не быть)
            $model_file = strtolower($model_name).'.php';
            $model_path = MODEL . $model_file;
            if(file_exists($model_path)) {
                include_once MODEL . $model_file;
            }
            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = CONTROLLER . $controller_file;

            // echo "File: $controller_file <br>";
            // echo "Path: $controller_path <br>";

            if(file_exists($controller_path)) {
                include_once CONTROLLER . $controller_file;
            } else {
                (new Route())->ErrorPage404();
            }

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;
            if(method_exists($controller, $action)) {
                // вызываем действие контроллера
                // $controller->$action();
                $controller->$action($data);
            } else {
                (new Route())->ErrorPage404();
            }
        }

        function ErrorPage404() {
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . URL . '404');
        }
    }