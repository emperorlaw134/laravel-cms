<?php
namespace App\Billing;

class stripe
{

    protected $key;

    public function __construct($key)
    {

        $this->key = $key;
        
    }
    
}