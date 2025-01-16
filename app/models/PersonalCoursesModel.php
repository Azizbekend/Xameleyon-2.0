<?php

namespace app\Models;

use app\core\Model;

class PersonalCoursesModel extends Model
{

    public function createCourses($idUser, $courseId)
    {
        $sql = "INSERT INTO `personalCourses` (`id`, `idUser`, `idCours`) VALUES (?, ?, ?)";
        $values = array(
            NULL,
            $idUser,
            $courseId,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function getAllCourses($idUser)
    {
        $sql = "SELECT * FROM `personalCourses` WHERE `idUser` = ?";
        $values = array(
            $idUser,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function getAllUserCourses($idCourse)
    {
        $sql = "SELECT * FROM `personalCourses` WHERE `idCours` = ?";
        $values = array(
            $idCourse,
        );
        return $this->connect->getAll($sql, $values);
    }
}
?>