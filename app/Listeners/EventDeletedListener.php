<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventDeletedCallback;

class EventDeletedListener
{
    public function handle(EventDeletedCallback $event)
    {
        return $event->obj->deleted_event();
    }
}