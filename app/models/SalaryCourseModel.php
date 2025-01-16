<?php

namespace app\Models;

use app\core\Model;

class SalaryCourseModel extends Model
{

    public function createSalaryCourse(array $data)
    {

        $experienceLevel = ['Junior', 'Middle', 'Senior'];
        $salaryLevel = $data['salary'];

        for ($i = 0; $i < 3; $i++) {
            $sql = "INSERT INTO `salaryCourse` (`id`, `name`, `salary`, `idCours`) 
                    VALUES (?, ?, ?, ?)";

            $values = array(
                NULL,
                $experienceLevel[$i],
                $salaryLevel[$i],
                $data['idcours'],
            );
            $this->connect->send($sql, $values);
        }
    }

    public function getAllSalaryCourse($idcours)
    {
        $sql = "SELECT * FROM `salaryCourse` WHERE idcours = ?";
        $values = array(
            $idcours,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function updateSalaryCourse(array $data)
    {

        $experienceLevel = ['Junior', 'Middle', 'Senior'];
        $salaryLevel = $data['salary'];
        $idCours = $data['idCours'];

        for ($i = 0; $i < 2; $i++) {
            $sql = "UPDATE `salaryCourse` SET `salary` = ? WHERE `name` =  ? AND `idCours` =  ?";

            $values = array(
                $salaryLevel[$i],
                $experienceLevel[$i],
                $idCours[$i],
            );
            return $this->connect->send($sql, $values);
        }
    }
}
?>