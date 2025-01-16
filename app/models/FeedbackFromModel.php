<?php

namespace app\Models;

use app\core\Model;

class FeedbackFromModel extends Model
{

    public function creatFeedbackFrom(array $data)
    {
        $sql = "INSERT INTO `feedbackFrom` (`id`, `name`, `telNumber`) 
                VALUES ( ?, ?, ?)";
        $values = array(
            NULL,
            $data['name'],
            $data['telNumber'],
        );
        return $this->connect->send($sql, $values);
    }

    public function getAllFeedbackFrom()
    {
        $sql = "SELECT * FROM `feedbackFrom`";
        return $this->connect->getAll($sql);
    }

    public function deleteFeedbackFrom($id)
    {
        $sql = "DELETE FROM `feedbackFrom` WHERE id = ?";
        $values = array(
            $id,
        );
        return $this->connect->send($sql, $values);
    }
}
?>