<?php

namespace app\Models;

use app\core\Model;

class TheoryModel extends Model
{

    public function creatTheory(array $data)
    {
        $sql = "INSERT INTO `theory` (`id`, `media`, `name`, `text`, `mediaType`) VALUES (?, ?, ?, ?, ?)";

        $values = array(
            NULL,
            $data['media'],
            $data['theoryName'],
            $data['textLesson'],
            $data['mediaType'],
        );

        return $this->connect->send($sql, $values);
    }

    public function getLastTheory()
    {
        $sql = "SELECT MAX(id) FROM `theory`";

        return $this->connect->getOne($sql);
    }
    public function getTheory($idTheory)
    {
        $sql = "SELECT * FROM `theory` WHERE `id` = ?";
        $values = array(
            $idTheory,
        );
        return $this->connect->getOne($sql, $values);
    }
    public function updateTheory(array $data)
    {
        $sql = "UPDATE `theory` SET `name` = ?, `text` = ? WHERE `id` = ?";
        $values = array(
            $data['theoryName'],
            $data['textLesson'],
            $data['id'],
        );
        $this->connect->send($sql, $values);

        if (!empty($data['media'])) {
            $sql = "UPDATE `theory` SET `media` = ?,  `mediaType` = ? WHERE `id` = ?";
            $values = array(
                $data['media'],
                $data['mediaType'],
                $data['id'],
            );
            $this->connect->send($sql, $values);
        }
    }
    public function removeTheory($idTheory)
    {
        $sql = "DELETE FROM `theory` WHERE `id` = ?";
        $values = array(
            $idTheory,
        );
        return $this->connect->send($sql, $values);
    }
}
?>