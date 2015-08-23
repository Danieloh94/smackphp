<?php

    namespace Smack\Contract\HttpCore;
    
    use \Smack\Contract\HttpCore\Uri\AuthorityContract;
				    
    interface UriContract
    {
        public function getScheme();
        public function setScheme($scheme);
        
        public function getAuthority();
        public function setAuthority(AuthorityContract $authority);
        
        public function getPath();
        public function setPath($path);
        
        public function getQuery();
        public function setQuery($query);
        
        public function getFragment();
        public function setFragment($fragment);
        
        public function __toString();
    }