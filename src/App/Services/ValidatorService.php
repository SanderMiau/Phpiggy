<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{
    RequiredRule, 
    EmailRule, 
    AgeRule,
    InRule,
    UrlRule,
    MatchRule
};

class ValidatorService{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add("required", new RequiredRule());
        $this->validator->add("email", new EmailRule());
        $this->validator->add("ageLim", new AgeRule());
        $this->validator->add("in", new InRule());
        $this->validator->add("url", new UrlRule());
        $this->validator->add("match", new MatchRule());
 
    }

    public function validateRegister(array $formData){
        $this->validator->validate($formData, [
            "email" => ["required", "email"],
            "age" => ["required", "ageLim:18"],
            "country" => ["in:USA,Canada,Mexico"],
            "socialMediaURL" => ["required", "url"],
            "password" => ["required"],
            "confirmPassword" => ["required", "match:password"],
            "tos" => ["required"]
        ]);
    }
}