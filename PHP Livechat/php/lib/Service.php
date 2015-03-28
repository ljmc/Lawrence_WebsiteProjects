<?php

// Base class for all services implementing the Singleton pattern

class Service
{
    // Fields
    
    private $services;
    
    // Methods
    
    public function setServiceContainer($container)
    {
        $this->services = $container;
        
        $this->onRegister();
    }
    
    public function onRegister()
    {
    }
    
    public function onRemove()
    {
    }
    
    public function get($serviceId)
    {
        return $this->services->get($serviceId);
    }
}

?>
