<?php

    namespace App\models;
    use App\core\Model;

    require_once CORE . 'config.php';

    class Model_Delete extends Model
    {
    	public function delete($fileName) {	
            $filePath = UPLOAD . $fileName;

            if(file_exists($filePath)) {
                unlink($filePath);
                return true;
            }
            return false;
	    }

    }