<?php

    namespace Smack\HttpCore;
    
    use \Smack\Contract\HttpCore\Uri\SchemeContract;
    use \Smack\Contract\HttpCore\Uri\AuthorityContract;
    use \Smack\Contract\HttpCore\Uri\PathContract;
    use \Smack\Contract\HttpCore\Uri\QueryContract;
    use \Smack\Contract\HttpCore\Uri\FragmentContract;
    use \Smack\Contract\HttpCore\UriContract;
				    
    class Uri implements UriContract
    {
        protected $scheme;
        protected $authority;
        protected $path;
        protected $query;
        protected $fragment;
        
        public function __construct(
            $authority, 
            $scheme = null, 
            $path = null, 
            $query = null, 
            $fragment = null
        ){
            $this->setAuthority($authority)
                ->setScheme($scheme)
                ->setPath($path)
                ->setQuery($query)
                ->setFragment($fragment);
        }
        
        public function __toString()
        {
            return (string) $this->scheme.$this->authority.$this->path.$this->query.$this->fragment;
        }
        
        public function getScheme()
        {
            return $this->scheme;
        }
        
        public function setScheme($scheme)
        {
            if ($scheme instanceOf SchemeContract) {
                $this->scheme = $scheme;
            }
            
            return $this;
        }
        
        public function getAuthority()
        {
            return $this->authority;
        }
        
        public function setAuthority(AuthorityContract $authority)
        {
            $this->authority = $authority;
            
            return $this;
        }
        
        public function getPath()
        {
            return $this->path;
        }
        
        public function setPath($path)
        {
            if ($path instanceOf PathContract) {
                $this->path = $path;
            }
            
            return $this;
        }
        
        public function getQuery()
        {
            return $this->query;
        }
        
        public function setQuery($query)
        {
            if ($query instanceOf QueryContract) {
                $this->query = $query;   
            }
            
            return $this;
        }
        
        public function getFragment()
        {
            return $this->fragment;
        }
        
        public function setFragment($fragment)
        {
            if ($fragment instanceOf FragmentContract) {
                $this->fragment = $fragment;
            }
            
            return $this;
        }
    }