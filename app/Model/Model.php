<?php

namespace App\Model;

use App\Database\DatabaseConnection;
use http\Exception;
use PDO;
use BadMethodCallException;

abstract  class Model
{
    protected  $table = null;
    public  $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function find($id)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function get()
    {
        try {

            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function create(array  $param)
    {
        try {
            $field = implode(',', array_keys($param));

            $value = ':' . implode(',:', array_keys($param));

            $sql = "INSERT INTO books ($field) VALUES ($value)";

            $stmt = $this->db->prepare($sql);

            foreach ($param as $key => $value) {

                $stmt->bindValue(":$key", $value);

            }

            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function latest(){
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY date('created_at') DESC LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function update(array $param, int $id)
    {
        try {
            $field = array_keys($param);
            $value = array_values($param);

            $sql = "UPDATE {$this->table} SET ";

            for ($i = 0; $i < count($field); $i++) {
                $sql .= $field[$i] . " = '" . $value[$i] . "'";
                if ($i < count($field) - 1) {
                    $sql .= ",";
                }
            }

            $sql .= " WHERE id = $id";

            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            return true;

        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteAll(array $ids = []){
        try {
            if(count($ids)){
                $sql = "DELETE FROM {$this->table} WHERE id in($ids)";
            }else{
                $sql = "DELETE FROM {$this->table}";
            }

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function __call($method, $args)
    {
        return  "Call to Undefined method {$method}";
    }


    public function __get($name)
    {
        return "Call to undefined property {$name}";
    }



}