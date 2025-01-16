<?php

namespace app\Models;

use app\core\Model;

class ProfessionModel extends Model
{
    public function getProfession($idUser)
    {
        $sql = "SELECT * FROM `profession` WHERE `idUser`  =  ?";
        $values = array(
            $idUser,
        );
        return $this->connect->getOne($sql, $values);
    }
}
?>