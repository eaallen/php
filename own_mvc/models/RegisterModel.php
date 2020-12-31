<?php
namespace app\models;

use app\core\Model;

/**
 * Class Register Model
 * @author Elijah Allen
 * @package app\models
 */

 class RegisterModel extends Model
 {
    public string $username;
    public string $password;
    public string $confirm_password;
    public string $email;

    public function rules():array
    {
        return [
            'username'=>[
                self::RULE_REQUIRED,
                self::RULE_UNIQUE
            ],
            'email'=>[
                self::RULE_REQUIRED, 
                self::RULE_UNIQUE, 
                self::RULE_EMAIL
            ],
            'password'=>[
                self::RULE_REQUIRED, 
                [self::RULE_MIN,'min'=>8],
                [self::RULE_MAX, 'max'=>24]
            ],
            'confirm_password'=>[
                self::RULE_REQUIRED, 
                [self::RULE_MATCH, 'match'=>'password']
            ]
        ];
    }


    public function register()
    {
        # code...
    }
}