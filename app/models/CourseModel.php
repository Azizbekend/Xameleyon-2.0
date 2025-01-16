<?php

namespace app\Models;

use app\core\Model;

use app\Models\SalaryCourseModel;
use app\Models\SkillsCourseModel;
use app\Models\DirectionModel;


//! Реализовать добавление курса
//! А также при обновлении курса, сделать предусматрения как у обновления данных user
class CourseModel extends Model
{
    public function createCourse(array $data)
    {
        $sql = "INSERT INTO `courses` (`id`, `img`, `name`, `price`, `specialist`, `miniDiscription`, `slogan`, `discription`, `telegLink`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $values = array(
            NULL,
            $data['img'],
            $data['name'],
            $data['price'],
            $data['specialist'],
            $data['miniDiscription'],
            $data['slogan'],
            $data['discription'],
            $data['telegLink']
        );

        return $this->connect->send($sql, $values);
    }
    public function getAllCourses()
    {
        $sql = "SELECT * FROM `courses`";
        return $this->connect->getAll($sql);
    }
    public function getCourse($id)
    {
        $sql = "SELECT * FROM `courses` WHERE id = ?";
        $values = array(
            $id,
        );
        return $this->connect->getOne($sql, $values);
    }
    public function getLastCourse()
    {
        $sql = "SELECT * FROM `courses` WHERE `id` = LAST_INSERT_ID()";
        return $this->connect->getOne($sql);
    }
    public function updateCourse(array $data)
    {
        $sql = "UPDATE `courses` SET `name` = ?,
                                    `price` = ?,
                                    `specialist` = ?,
                                    `miniDiscription` = ?,
                                    `slogan` = ?,
                                    `discription` = ?,
                                    `telegLink` = ?
                                    WHERE `id` = ?";

        $values = array(
            $data['name'],
            $data['price'],
            $data['specialist'],
            $data['miniDiscription'],
            $data['slogan'],
            $data['discription'],
            $data['telegLink'],
            $data['id'],
        );
        $this->connect->send($sql, $values);
    }
    public function deleteCourse($id)
    {
        $sql = "DELETE FROM `courses` WHERE id = ?";
        $values = array(
            $id
        );
        return $this->connect->send($sql, $values);
    }
    public function releaseOpenCourse($id)
    {
        $sql = "UPDATE `courses` SET `releaseCourse` = 1 WHERE `id` = ?";
        $values = array(
            $id,
        );
        return $this->connect->send($sql, $values);
    }
    public function releaseCloseCourse($id)
    {
        $sql = "UPDATE `courses` SET `releaseCourse` = 0 WHERE `id` = ?";
        $values = array(
            $id,
        );
        return $this->connect->send($sql, $values);
    }

}
?>