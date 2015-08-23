<?php

    namespace Smack\Contract\HttpCore;
    
    use \Smack\Contract\HttpCore\ServerRequest\ServerParamsContract;
    use \Smack\StdLib\Collection;
    
    interface ServerRequestContract
    {
        public function getServerParams();
        public function setServerParams(ServerParamsContract $serverParams);
        
        public function getFileParams();
        
        public function setFileParams(Collection $fileParams);
        public function getPostParams();
        
        public function setPostParams(Collection $postParams);
        
        public function getQueryParams();
        public function setQueryParams(Collection $queryParams);
        
        public function getCookieParams();
        
        public function setCookieParams(Collection $cookieParams);
        
        public function getAttributes();
        public function setAttributes(Collection $attributes);
    }