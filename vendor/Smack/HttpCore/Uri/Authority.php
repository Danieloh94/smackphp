<?php

    namespace Smack\HttpCore\Uri;
    
    use \Smack\Contract\HttpCore\Uri\Authority\UserInfoContract;
    use \Smack\Contract\HttpCore\Uri\Authority\HostContract;
    use \Smack\Contract\HttpCore\Uri\Authority\PortContract;
    use \Smack\Contract\HttpCore\Uri\AuthorityContract;
    
    class Authority implements AuthorityContract
    {
        protected $host;
        protected $userInfo;
        protected $port;
        
        public function __construct($host, $userInfo = null, $port = null)
        {
            if ($userInfo !== null) {
                $this->setUserInfo($userInfo);
            }
            
            if ($port !== null) {
                $this->setPort($port);
            }
            
            $this->setHost($host);
        }
        
        public function __toString()
        {
            return $this->userInfo.$this->host.$this->port;
        }
        
        public function getUserInfo()
        {
            return $this->userInfo;
        }
        
        public function setUserInfo(UserInfoContract  $userInfo)
        {
            $this->userInfo = $userInfo;
        }
        
        public function getHost()
        {
            return $this->host;
        }
        
        public function setHost(HostContract $host)
        {       
            $this->host = $host;
        }
        
        public function getPort()
        {
            return $this->port;
        }
        
        public function setPort(PortContract $port)
        {
            $this->port = $port;
        }
    }