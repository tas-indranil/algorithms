<?php

class LazyInitialization
{
    private $initialized  = false;
    private $data;

    public function getData()
    {
        if(!$this->initialized)
        {
            $this->initialize();
        }
        return $this->data;
    }

    private function initialize()
    {
        $this->data = "initialized Data";
        $this->initialized = true;
    }
}

$lazy =  new LazyInitialization();
print_r($lazy->getData());

