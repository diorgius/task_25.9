<?php

    namespace App\models;
    use App\core\Model;

    require_once CORE . 'config.php';

    class Model_Upload extends Model
    {
    	public function loading($files) {	

            $fileExist = new Model_Main();
            $fileExist = $fileExist->getData();

            $result = [];
            
            if(!empty($files)) {

                if(count($files['files']['name']) > 20) {
                    $result [] = "Выбрано больше 20 файлов";
                    return $result;
                }

                for($i = 0; $i < count($files['files']['name']); $i++) {

                    $fileName = $files['files']['name'][$i];

                    if(array_search($fileName, $fileExist)) {
                        $result [] = "Файл с именем . $fileName . существует";
                        continue;
                    }

                    if($files['files']['size'][$i] > UPLOAD_MAX_SIZE) {
                        $result [] = 'Недопустимый размер файла ' . $fileName;
                        continue;
                    }

                    if(!in_array($files['files']['type'][$i], ALLOWED_TYPES)) {
                        $result [] = 'Недопустимый формат файла ' . $fileName;
                        continue;
                    }

                    $filePath = UPLOAD . basename($fileName);

                    if(!move_uploaded_file($files['files']['tmp_name'][$i], $filePath)) {
                        $result [] = 'Ошибка загрузки файла ' . $fileName;
                        continue;
                    } 
                }
            }
            return $result;
	    }
    }