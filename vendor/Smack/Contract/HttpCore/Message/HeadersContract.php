<?php

    namespace Smack\Contract\HttpCore\Message;
    
    use \Smack\Contract\HttpCore\Message\Headers\HeaderContract;
    
    interface HeadersContract
    {        
        public function set(HeaderContract $header);
        public function setAll(array $headers);
        
        public function __toString();
    }