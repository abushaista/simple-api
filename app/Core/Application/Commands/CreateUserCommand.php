<?php

namespace App\Core\Application\Commands;

class CreateUserCommand {
    
    public function __construct(
        public string $name, 
        public string $email, 
        public string $password,){}
}