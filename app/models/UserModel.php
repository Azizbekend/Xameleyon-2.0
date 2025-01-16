<?php

namespace app\Models;

use app\core\Model;

use app\models\DirectionModel;

class UserModel extends Model
{

    public function createUser(array $data)
    {
        $sql = "INSERT INTO `user` (`id`, `surname`, `name`, `middleName`, `birthday`, `telegaLink`, `telNumber`, `email`, `password`, `idRole`, `img`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $values = array(
            NULL,
            $data['surname'],
            $data['name'],
            $data['middleName'],
            null,
            $data['telegaLink'],
            $data['telNumber'],
            $data['email'],
            $data['password'],
            $data['idRole'],
            NULL
        );
        return $this->connect->send($sql, $values);
    }

    public function getAllUserRole($idRole)
    {
        $sql = "SELECT * FROM `user` WHERE `idRole` = ?";
        $values = array(
            $idRole,
        );
        return $this->connect->getAll($sql, $values);
    }

    public function getInfoUser($id)
    {
        $sql = "SELECT * FROM `user` WHERE `id` = ?";
        $values = array(
            $id,
        );
        return $this->connect->getOne($sql, $values);
    }

    public function getLoginUser($email, $password)
    {
        $chekUser = [];
        $sql = "SELECT * FROM `user` WHERE `email` = ?";
        $values = array(
            $email,
        );
        $chekUser['email'] = !empty($this->connect->getOne($sql, $values));
        $sql = "SELECT * FROM `user` WHERE `email` = ? AND `password` = ?";
        $values = array(
            $email,
            $password,
        );
        $chekUser['password'] = !empty($this->connect->getOne($sql, $values));
        return $chekUser;
    }

    public function getRegisterUser($email)
    {
        $sql = "SELECT * FROM `user` WHERE `email` = ?";

        $values = array(
            $email,
        );

        return $this->connect->getAll($sql, $values);
    }

    public function getLastUser()
    {
        $sql = "SELECT * FROM `user` WHERE `id` = LAST_INSERT_ID()";
        return $this->connect->getOne($sql);
    }

    public function deleteUserFoto($idUser)
    {
        $sql = "UPDATE `user` SET `img` = '' WHERE `id` = ?";
        $values = array(
            $idUser,
        );
        return $this->connect->send($sql, $values);
    }

    public function updateInfoUser(array $data)
    {
        $result = [];

        $sql = "UPDATE `user` SET `surname` = ?, `name` = ?, `middleName` = ?, `birthday` = ?, `telNumber` = ?, `telegaLink` = ?, `email` = ? WHERE `id` = ?";

        $values = array(
            $data['surname'],
            $data['name'],
            $data["middleName"],
            $data["birthday"],
            $data['telNumber'],
            $data["telegaLink"],
            $data['email'],
            $data['id'],
        );

        array_push($result, $this->connect->send($sql, $values));

        if (!empty($data["userFoto"])) {
            $sql = "UPDATE `user` SET `img` = ?  WHERE `id` = ?";

            $values = array(
                $data["userFoto"],
                $data['id'],
            );

            array_push($result, $this->connect->send($sql, $values));
        }

        if (!empty($data["password"])) {
            $sql = "UPDATE `user` SET `password` = ? WHERE `id` = ?";

            $values = array(
                $data["password"],
                $data['id'],
            );

            array_push($result, $this->connect->send($sql, $values));
        }

        return $result;
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM `user` WHERE `id` = ?";

        $values = array(
            $id,
        );

        return $this->connect->send($sql, $values);
    }
    public function banUser($id)
    {
        $sql = "UPDATE `user` SET `ban` = 1 WHERE `id` = ?";
        $values = array(
            $id,
        );

        return $this->connect->send($sql, $values);
    }
    public function razBanUser($id)
    {
        $sql = "UPDATE `user` SET `ban` = 0 WHERE `id` = ?";
        $values = array(
            $id,
        );

        return $this->connect->send($sql, $values);
    }
}
?>