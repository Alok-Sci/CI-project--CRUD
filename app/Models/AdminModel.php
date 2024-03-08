<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

use CodeIgniter\DatabaseConnectionInterface;

class AdminModel extends Model
{

    protected $db;


    // constructor function takes reference of db object that implements connectioninterface as argument
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db; //assign the reference of the $db variable to the db property of current class instance 
    }

    public function is_admin($username, $pass)
    {

        // return $this->db
        //     ->table('tbl_admin') // set the table for query 
        //     ->where('username', $username)
        //     ->where('password', $pass) // set the conditions to check for where clause
        //     ->get() // fire the query and recieve the data
        //     ->getRow(); // get the first row of result object

        return $this->db
            ->table('tbl_admin') // set the table for query 
            ->where(['username' => $username, 'password' => $pass]) // set the conditions to check for where clause
            ->get()->getRow();
            
        // return $this->db
        //     ->query('SELECT * FROM tbl_admin WHERE `username` = \'$username\' AND `password` = \'$pass\'');

    }


}

