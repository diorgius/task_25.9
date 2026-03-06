<?php

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    require_once CORE . 'config.php';

    class Model_Delete extends Model
    {
    	public function deleteFile(string $file) {	
            $filePath = UPLOAD . $file;

            if(file_exists($filePath)) {
                unlink($filePath);
                return $result = (new DB())->deleteByProp($file, 'file', 'comments');
            }
            return false;
	    }
        
    	public function deleteComment(int $commentId) {	
            return $result = (new DB())->deleteByProp($commentId, 'id', 'comments');
	    }
    }