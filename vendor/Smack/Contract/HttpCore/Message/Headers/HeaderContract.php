<?php

    namespace Smack\Contract\HttpCore\Message\Headers;
    
    interface HeaderContract
    {       
        public function getKey();
        public function setKey($key);
        
        public function getValue();
        public function setValue($value);
        
        public function __toString();
    }