<?php

    namespace App\models;
    use App\core\Model;

    require_once CORE . 'config.php';

    class Model_Main extends Model
    {
    	public function get_data() {	
            $files = scandir(UPLOAD);
            $files = array_filter($files, function ($file) {
                return !in_array($file, ['.', '..']);
            });
            return $files;
	    }

    }