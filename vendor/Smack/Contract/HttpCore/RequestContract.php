<?php

    namespace Smack\Contract\HttpCore;
    
    use \Smack\Contract\HttpCore\UriContract;
    use \Smack\Contract\HttpCore\Request\MethodContract;
    
    interface RequestContract
    {
        public function getMethod();
        public function setMethod(MethodContract $method);
        
        public function getUri();
        public function setUri(UriContract $uri);
        
        public function getRequestLine();
        
        public function __toString();
    }