<?php
require_once('DBConnection.php');

class User extends DBConnection
{

    protected $name;

    protected $email;

    protected $password;

    protected $cpf;

    protected $admin;

    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM `users`";
            $dbc = new DBConnection();
            return $dbc->getQuery($sql);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }

    public function getUser($id)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE id = :id";
            $params = array(':id' => $id);
            $dbc = new DBConnection();
            return $dbc->getQuery($sql, $params);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }

    public function insertUser()
    {
        try {
            $sql = "INSERT INTO `users` (`name`, `email`, `password`, `cpf`, `admin`) VALUES (:name, :email, :password, :cpf, :admin)";
            $params = array(
                ':name' => $this->name,
                ':email' => $this->email,
                ':password' => $this->password,
                ':cpf' => $this->cpf,
                ':admin' => $this->admin
            );
            $dbc = new DBConnection();
            return $dbc->runQuery($sql, $params);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }

    public function updateUser(array $params)
    {
        try {
            $sql = "UPDATE `users` SET";
            $separator = " ";
            foreach ($params as $key => $value) {
                if ($key == "id") {
                    continue;
                }
                $sql .= $separator . $key . " = :" . $key;
                $separator = ", ";
            }

            $sql .= " WHERE id = :id";

            $dbc = new DBConnection();
            return $dbc->runQuery($sql, $params);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM `users` WHERE id = :id";
            $params = array(':id' => $id);
            $dbc = new DBConnection();
            return $dbc->runQuery($sql, $params);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }
}
