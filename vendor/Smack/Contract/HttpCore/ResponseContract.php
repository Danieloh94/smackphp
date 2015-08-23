<?php

    namespace Smack\Contract\HttpCore;
    
    use \Smack\Contract\HttpCore\Response\StatusContract;
    
    interface ResponseContract
    {
        public function getStatus();
        public function setStatus(StatusContract $status);
        
        public function getResponseLine();
        
        public function __toString();
    }