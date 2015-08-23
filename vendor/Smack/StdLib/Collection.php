<?php

    namespace Smack\StdLib;
				    
    class Collection
    {
        protected $data;
        
        public function __construct($data = [])
        {
            $this->data = $data;
        }
        
        public function get($key = null)
        {
            if ($key === null) {
                return $this->data;
            }
            
            return $this->hasKey($key) ? $this->data[$key] : null;
        }
        
        public function set($key, $val = null)
        {
            if (is_array($key)) {
                $this->data = array_merge($key, $this->data);
            } else {
                $this->data[$key] = $val;
            }
            
            return $this;
        }
        
        public function hasKey($key)
        {
            return array_key_exists($key, $this->data) ? true : false;
        }
        
        public function hasValue($val)
        {
            return in_array($val, $this->data);
        }
        
        public function remove($key, $return = false)
        {
            if ($return === true) {
                $item = $this->get($key);
            }
            
            unset($this->data[$key]);
            
            return isset($item) ? $item : null;
        }
    }