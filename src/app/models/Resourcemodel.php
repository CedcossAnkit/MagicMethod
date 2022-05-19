<?php

use Phalcon\Di\Injectable;

class Resourcemodel extends Injectable
{
    public $table = '';
    public $primaryKey = 'id';
    public $connection = false;
    public $data = [];
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function save()
    {
        $tableName = $this->table;
        $response = $this->mongo->data->$tableName->insertOne(["name" => $this->name, "Rollno" => $this->rollno, "Address" => $this->address]);
        die(print_r($response));
    }

    public function delete()
    {
        $tableName = $this->table;
        $id = new \MongoDB\BSON\ObjectId($this->id['id']);
        $response = $this->mongo->data->$tableName->deleteOne(["_id" => $id]);
        die(print_r($response));
    }

    public function load($rollno)
    {
        $tableName = $this->table;
        $response = $this->mongo->data->$tableName->findOne(["Rollno" => (string)$rollno]);
        return $response;
    }

    public function update()
    {
        if ($this->id !== null) {
            $tableName = $this->table;
            $id = new \MongoDB\BSON\ObjectId($this->id);

            $updateResult = $this->mongo->data->$tableName->updateOne(
                ['_id' => $id],
                ['$set' => ['name' => $this->name, "Rollno" => $this->rollno, "Address" => $this->address]]
            );
        }
        die(print_r($updateResult));
    }
}
