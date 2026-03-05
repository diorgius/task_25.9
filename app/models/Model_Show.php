<?php    

    namespace App\models;
    use App\core\Model;
    use App\data\DB;

    class Model_Show extends Model
    {
        public function addComment(array $commentData) {
            return $result = (new DB())->createComment($commentData, 'comments');
        }

        public function showComment(string $picture) {
            return $result = (new DB())->getCommentProp($picture, 'picture', 'comments');
        }
    }