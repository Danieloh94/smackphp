<?php

    namespace Smack\Contract\HttpCore\Uri;
    
    use \Smack\Contract\HttpCore\Uri\Authority\UserInfoContract;
    use \Smack\Contract\HttpCore\Uri\Authority\HostContract;
    use \Smack\Contract\HttpCore\Uri\Authority\PortContract;
    
    interface AuthorityContract
    {  
        public function __toString();
        
        public function getUserInfo();
        public function setUserInfo(UserInfoContract  $userInfo);
        
        public function getHost();
        public function setHost(HostContract $host);
        
        public function getPort();
        public function setPort(PortContract $port);
    }