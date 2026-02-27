<?php
    require_once 'config.php';

    class Route
    {
        public static function start()
        {
            // контроллер и действие по умолчанию
            $controller_name = 'main';
            $action_name = 'index';
            $routes = $_GET['url'];

            // var_dump($_SERVER['REQUEST_URI']);
            // echo "<br>";
            // var_dump($_GET['url']);
            // echo "<br>";
            // echo 'URL <br>';
            // var_dump(URL);
            // echo '<br>';
            // echo 'ROOT <br>';
            // var_dump(ROOT);
            // echo '<br>';
            // echo 'APP <br>';
            // var_dump(APP);
            // echo '<br>';
            // echo 'CONTROLLER <br>';
            // var_dump(CONTROLLER);
            // echo '<br>';
            // echo 'CORE <br>';
            // var_dump(CORE);
            // echo '<br>';
            // echo 'MODEL <br>';
            // var_dump(MODEL);
            // echo '<br>';
            // echo 'VIEW <br>';
            // var_dump(VIEW);
            // echo '<br>';
            // echo 'DATA <br>';
            // var_dump(DATA);
            // echo '<br>';
            // echo 'UPLOAD <br>';
            // var_dump(UPLOAD);
            // echo '<br>';
            // echo 'CSS <br>';
            // var_dump(CSS);
            // echo '<br>';
            // echo 'JS <br>';
            // var_dump(JS);
            // echo '<br>';

            // получаем имя контроллера
            if (!empty($routes))
            {
                $controller_name = $routes;
            }

            // добавляем префиксы
            $model_name = 'model_'.$controller_name;
            $controller_name = 'controller_'.$controller_name;
            $action_name = 'action_'.$action_name;

            // echo "Model: $model_name <br>";
            // echo "Controller: $controller_name <br>";
            // echo "Action: $action_name <br>";

            // подцепляем файл с классом модели (файла модели может и не быть)
            $model_file = strtolower($model_name).'.php';
            $model_path = MODEL . $model_file;
            if(file_exists($model_path))
            {
                include_once MODEL . $model_file;
            }
            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = CONTROLLER . $controller_file;

            // echo "File: $controller_file <br>";
            // echo "Path: $controller_path <br>";

            if(file_exists($controller_path))
            {
                include_once CONTROLLER . $controller_file;
            }
            else
            {
                (new Route())->ErrorPage404();
            }

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;
            if(method_exists($controller, $action))
            {
                // вызываем действие контроллера
                $controller->$action();
            }
            else
            {
                (new Route())->ErrorPage404();
            }
        }
        function ErrorPage404()
        {
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . URL . '404');
        }
    }