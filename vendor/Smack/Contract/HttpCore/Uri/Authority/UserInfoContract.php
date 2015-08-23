<?php

    namespace Smack\Contract\HttpCore\Uri\Authority;
    
    interface UserInfoContract
    {
        public function __toString();
        
        public function getUser();
        public function setUser($user);
        
        public function getPassword();  
        public function setPassword($password);
    }