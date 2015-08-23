<?php

    namespace Smack\HttpCore\Uri\Authority;
    
    use \Smack\Contract\HttpCore\Uri\Authority\UserInfoContract;
    
    class UserInfo implements UserInfoContract
    {
        protected $user;
        protected $password;
        
        public function __construct($user, $password = null)
        {
            $this->setUser($user);
            
            if ($password !== null) {
                $this->setPassword($password);
            }
        }
        
        public function __toString()
        {
            if (isset($this->password)) {
                return $this->user.':'.$this->password.'@';
            } else {
                return $this->user.'@';
            }
        }
        
        public function getUser()
        {
            return $this->user;
        }
        
        public function setUser($user)
        {
            if (!is_string($user) || $user === '') {
                throw new \InvalidArgumentException(sprintf(
                    'user argument must be of type string and not empty, "%s" recieved.',
                    is_object($user) ? get_class($user) : gettype($user)
                ));
            }
            
            $this->user = $user;
        }
        
        public function getPassword()
        {
            return $this->password;
        }
        
        public function setPassword($password)
        {
            if (!is_string($password)) {
                throw new \InvalidArgumentException(sprintf(
                    'password argument must be of type string, "%s" recieved.',
                    is_object($password) ? get_class($password) : gettype($password)
                ));
            }
            
            $this->password = $password;
        }
    }