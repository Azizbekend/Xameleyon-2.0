<?php

namespace app\Models;

use app\core\Model;

use app\models\UserModel;
use app\models\CourseModel;


class DirectionModel extends Model
{
    public function createDirection(array $data)
    {
        $sql = "INSERT INTO `direction` (`id`, `idTeacher`, `idCours`) VALUES (?, ?, ?)";
        $values = array(
            NULL,
            $data['idTeacher'],
            $data['idCours'],
        );
        return $this->connect->send($sql, $values);
    }

    public function getTeacherDirection($idTeacher)
    {
        $sql = "SELECT * FROM `direction` WHERE `idTeacher` = ?";
        $values = array(
            $idTeacher
        );
        return $this->connect->getAll($sql, $values);
    }
    public function getCourseDirection($idTeacher)
    {
        $sql = "SELECT * FROM `direction` WHERE `idCours` = ?";
        $values = array(
            $idTeacher
        );
        return $this->connect->getAll($sql, $values);
    }

    public function deleteDirection(array $data)
    {
        $sql = "DELETE FROM `direction` WHERE idTeacher = ? AND idCours = ?";
        $values = array(
            $data['idTeacher'],
            $data['idCours'],
        );
        return $this->connect->send($sql, $values);
    }
}
?>