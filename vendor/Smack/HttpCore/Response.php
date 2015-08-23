<?php

    namespace Smack\HttpCore;
    
    use \Smack\Contract\HttpCore\Response\StatusContract;
    use \Smack\Contract\HttpCore\ResponseContract;
    use \Smack\HttpCore\Message;
				    
    class Response extends Message implements ResponseContract
    {
        protected $status;
        
        public function __construct($status, $body, $headers, $protocol)
        {
            $this->setStatus($status);
            
            parent::__construct($body, $headers, $protocol);
        }
        
        public function __toString()
        {
            return (string) $this->getResponseLine()."\r\n".$this->headers."\r\n".$this->body;
        }
        
        public function getResponseLine()
        {
            return (string) $this->protocol.' '.$this->status;
        }
        
        public function getStatus()
        {
            return $this->status;
        }
        
        public function setStatus(StatusContract $status)
        {
            $this->status = $status;
        }
    }