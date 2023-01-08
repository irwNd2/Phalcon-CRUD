<?php

use Phalcon\Mvc\Model;

class User extends Model
{
    public $id;
    public $username;
    public $email;
    public $password;

    public function initialize()
    {
        // Set the database connection
        $this->setConnectionService('db');

        // Set the table name
        $this->setSource('users');
    }
}

?>
