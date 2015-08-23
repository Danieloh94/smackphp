<?php

    namespace Smack\HttpCore;

    use \Smack\HttpCore\Uri\Scheme;
    use \Smack\HttpCore\Uri\Authority;
    use \Smack\HttpCore\Uri\Authority\Host;
    use \Smack\HttpCore\Uri\Authority\Port;
    use \Smack\HttpCore\Uri\Authority\UserInfo;
    use \Smack\HttpCore\Uri\Path;
    use \Smack\HttpCore\Uri\Query;
    use \Smack\HttpCore\Uri\Fragment;
    use \Smack\HttpCore\Uri;
    
    class UriFactory
    {
        public function fromString($uri)
        {
            if (!is_string($uri)) {
                throw new \InvalidArgumentException(sprintf(
                    'uri must be of type string, "%s" recieved.',
                    is_object($uri) ? get_class($uri) : gettype($uri)
                ));
            }

            return $this->fromParts($this->parseUri($uri));
        }
        
        public function fromArgs(
            $scheme = null, 
            $user = null, 
            $pass = null, 
            $host = 'localhost', 
            $port = null, 
            $path = null, 
            $query = null, 
            $fragment = null
        ){
            return new Uri(
                $this->makeAuthority($host, $user, $pass, $port),
                $this->makeScheme($scheme),
                $this->makePath($path),
                $this->makeQuery($query),
                $this->makeFragment($fragment)
            );
        }
        
        public function fromParts(array $parts)
        {
            return $this->fromArgs(
                $this->getPart('scheme', $parts),
                $this->getPart('user', $parts),
                $this->getPart('pass', $parts),
                $this->getPart('host', $parts),
                $this->getPart('port', $parts),
                $this->getPart('path', $parts),
                $this->getPart('query', $parts),
                $this->getPart('fragment', $parts)
            );
        }
        
        public function getPart($key, $parts)
        {
            if (array_key_exists($key, $parts)) {
                return $parts[$key];
            }
            
            return null;
        }
        
        public function makeScheme($scheme = null)
        {
            if ($scheme !== null) {
                return new Scheme($scheme);
            }
        }
        
        public function makeAuthority($host, $user = null, $pass = null, $port = null)
        {
            return new Authority(
                $this->makeHost($host),
                $this->makeUserInfo($user, $pass),
                $this->makePort($port)
            );
        }
        
        public function makeUserInfo($user = null, $pass = null)
        {
            if ($user !== null) {
                return new UserInfo($user, $pass);
            }
        }
        
        public function makePort($port = null)
        {
            if ($port !== null) {
                return new Port((int) $port);
            }
        }
        
        public function makeHost($host)
        {
            return new Host($host);
        }
        
        public function makePath($path = null)
        {
            if ($path !== null) {
                return new Path($path);
            }
        }
        
        public function makeQuery($query = null) 
        {
            if ($query !== null && $query !== '') {
                return new Query($query);
            }
        }
        
        public function makeFragment($fragment = null)
        {
            if ($fragment !== null) {
                return new Fragment($fragment);
            }
        }
        
        public function parseUri($uri)
        {
            $parts = parse_url($uri);
            
            if ($parts !== false) {
                return $parts;
            } else {
                throw new \LogicException(sprintf(
                    'unable to pass uri, uri may be malformed, "%s" recieved.', $uri
                ));
            }
        }
    }