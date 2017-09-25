<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 10:59 AM
 */

namespace App\Events;

class EventRestoredCallback
{
    public $obj;

    public function __construct($obj)
    {
        $this->obj = $obj;
    }
}