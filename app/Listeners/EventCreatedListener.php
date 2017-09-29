<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventCreatedCallback;

class EventCreatedListener
{
    public function handle(EventCreatedCallback $event)
    {
        return $event->obj->created_event();
    }
}