<?php

namespace app\Models;

use app\core\Model;

class LessonModel extends Model
{

    public function getLesson($idCours)
    {
        $sql = "SELECT * FROM `lesson` WHERE idCours = ?";

        $values = array(
            $idCours,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function getLastLesson()
    {
        $sql = "SELECT MAX(id) FROM `lesson`";
        return $this->connect->getOne($sql);
    }

    public function getCourseLesson($idCours)
    {
        $sql = "SELECT * FROM `lesson` WHERE `idCours` = ?";
        $values = array(
            $idCours,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function createLesson(array $data)
    {
        $sql = "INSERT INTO `lesson` (`id`, `idCours`, `idTheory`)
            VALUES (?, ?, ?);";
        $values = array(
            NULL,
            $data['idCours'],
            $data['idTheoty'],
        );
        return $this->connect->send($sql, $values);
    }
}
?>