<?php

namespace app\Models;

use app\core\Model;

class GradeStudentsModel extends Model
{

    public function creatGradeStudents(array $data)
    {
        $sql = "INSERT INTO `gradeStudents` (`id`, `idStudent`, `idLesson`, `status`) VALUES (?, ?, ?, ?)";
        $values = array(
            NULL,
            $data['idStudent'],
            $data['idLesson'],
            0,
        );
        return $this->connect->send($sql, $values);
    }

    public function getGradeStudents($idUser, $idLesson)
    {
        $sql = "SELECT * FROM `gradeStudents` WHERE `idStudent` = ? AND `idLesson` = ?";
        $values = array(
            $idUser,
            $idLesson,
        );
        return $this->connect->getOne($sql, $values);
    }

    public function getGradeLesson($idLesson)
    {
        $sql = "SELECT * FROM `gradeStudents` WHERE `idLesson` = ?";
        $values = array(
            $idLesson,
        );
        return $this->connect->getOne($sql, $values);
    }

    public function updateGradeStudents($idUSer, $idLesson)
    {
        $sql = "UPDATE `gradeStudents` SET `status` = '1' WHERE `idStudent` = ? AND `idLesson` = ?";

        $values = array(
            $idUSer,
            $idLesson,
        );
        return $this->connect->send($sql, $values);
    }
}
?>