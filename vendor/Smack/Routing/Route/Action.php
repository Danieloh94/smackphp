<?php

    namespace Smack\Routing\Route;
    
    class Action
    {
        protected $class;
        protected $method;
        
        public function __construct($action)
        {
            $this->set($action);
        }
        
        public function set($action)
        { 
            if (!is_string($action) || $action === '') {
                throw new \InvalidArgumentException(sprintf(
                    'action must be of type string and not empty, "%s" recieved.',
                    is_object($action) ? get_class($action) : gettype($action)
                ));
            }
            
            $action = $this->split($action);
            
            $this->class = $action['class'];
            $this->method = $action['method'];  
        }
        
        public function get()
        {
            return ['class' => $this->class, 'method' => $this->method];
        }
        
        public function getClass()
        {
            return $this->class;
        }
        
        public function getMethod()
        {
            return $this->method;
        }
        
        public function split($action)
        {
            if (strpos($action, '::') === true) {
                $parts = explode('::', $action);
                $action = ['class' => $parts[0], 'method' => $parts[1]];
            } else {
                $action = ['class' => $action, 'method' => '__invoke'];
            }
            
            return $action;
        }
    }
    
    