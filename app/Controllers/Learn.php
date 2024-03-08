<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// import namespace to use AdminModel class
use App\Models\AdminModel;  

class Home extends BaseController
{

    // * index() method of controller is by default called 
    // * there can have only one index() method in a single controller 
    
    // public function welcome(): string
    // {
    //     return view('welcome_message');
    // }

// * if we want to talk with model then we'll include this in the controller file 
public function __construct()
    {
        $db               = db_connect();
        $this->adminModel = new AdminModel($db);
    }

    public function index(){
        // * set a session using a key name 
        // $this->session->set('key', 'value');

        // * get session using a key name 
        // $this->session->key;
        // $this->session->get('key');
        

        

        $data = [
            'title' => 'This is home', // * title for Views/templates/header.php
            'main_content' => 'home' // * Views/index.php
        ];

        // * echo the templates/template.php and pass the above data to it.
        return view('templates/template', $data);
    }

    // public function login(){
    //     return view('login.php');
    // }

    // public function register(){
    //     return view('register.php');
    // }

    // public function showAllRecords(){
    //     return view('all_records.php');
    // }
}
