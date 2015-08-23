<?php

    namespace Smack\HttpCore;
    
    use \Smack\HttpCore\Request;
    use \Smack\Contract\HttpCore\ServerRequestContract;
    use \Smack\StdLib\Collection;
    use \Smack\Contract\HttpCore\ServerRequest\ServerParamsContract;
    
    class ServerRequest extends Request implements ServerRequestContract
    {
        protected $serverParams;    
        protected $fileParams;
        protected $postParams;       
        protected $queryParams;      
        protected $cookieParams;  
        protected $attributes;

        public function __construct(
            $server,
            $method, 
            $uri,
            $body, 
            $headers,
            $protocol
        ) {
            $this->setServerParams($server);
            parent::__construct($method, $uri, $body, $headers, $protocol);
        }
        
        public function getServerParams()
        {
            return $this->serverParams;
        }
        
        public function setServerParams(ServerParamsContract $serverParams)
        {
            $this->serverParams = $serverParams;
        }
        
        public function getFileParams()
        {
            return $this->fileParams;
        }
        
        public function setFileParams(Collection $fileParams)
        {
            $this->fileParams = $fileParams;
        }
        
        public function getPostParams()
        {
            return $this->postParams;
        }
        
        public function setPostParams(Collection $postParams)
        {
            $this->postParams = $postParams;
        }
        
        public function getQueryParams()
        {
            return $this->queryParams;
        }
        
        public function setQueryParams(Collection $queryParams)
        {
            $this->queryParams = $queryParams;
        }
        
        public function getCookieParams()
        {
            return $this->cookieParams;
        }
        
        public function setCookieParams(Collection $cookieParams)
        {
            $this->cookieParams = $cookieParams;
        }
        
        public function getAttributes()
        {
            return $this->attributes;
        }
        
        public function setAttributes(Collection $attributes)
        {
            $this->attributes = $attributes;
        }
    }