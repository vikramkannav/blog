<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventUpdatedCallback;

class EventUpdatedListener
{
    public function handle(EventUpdatedCallback $event)
    {
        return $event->obj->updated_event();
    }
}