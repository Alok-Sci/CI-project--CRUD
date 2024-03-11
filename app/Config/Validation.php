<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------


    // creating custom 'validation rule group' : Alok Singh

    public array $login = [
        'username' => 'required|min_length[4]|max_length[30]|alpha_numeric',
        'password' => 'required|min_length[8]|max_length[14]|string'
    ];

    // create custom error messages for a 'validation rule group' 
    public array $login_errors = [
        'username' => [
            'required' => 'Username cannot be empty',
            'min_length' => 'Length of username should be atleast 4 characters',
            'max_length' => 'Length of username can not be more than 30 characters',
            'alpha_numeric' => 'Username can only contain alphabets and numbers'
        ],
        'password' => [
            'required' => 'Password cannot be empty',
            'min_length' => 'Length of password should be atleast 8 characters',
            'max_length' => 'Length of password can not be more than 14 characters',
            'string' => 'Password must be a string'
        ]
    ];


    // set rules and custom error messages for register group 

    // use: validation()->run($data, 'register'); 
    public array $register = [
        'name' => [
            'rules' => 'required|alpha',
            'errors' => [
                'required' => 'Name cannot be empty',
                'alpha' => 'Name can only contain alphabets'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email cannot be empty',
                'valid_email' => 'Wrong email format'
            ]
        ],
        'mobile' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Mobile cannot be empty',
                'numeric' => 'Please enter a valid mobile number'
            ]
        ]
    ];
}
