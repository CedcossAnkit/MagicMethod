<?php

use Phalcon\Mvc\Model;

class ResourceModel
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $connection = false;

    public function load()
    {
    }

    public function save()
    {
        return $this->table;
    }

    public function delete()
    {
    }

    public function update()
    {
    }
}

class Users extends ResourceModel
{
    public $id;
    public $name;
    public $email;
}
