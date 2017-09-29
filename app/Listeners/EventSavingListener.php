<?php
/**
 * Created by PhpStorm.
 * User: sachin
 * Date: 4/20/17
 * Time: 11:02 AM
 */

namespace App\Listeners;

use App\Events\EventSavingCallback;

class EventSavingListener
{
    public function handle(EventSavingCallback $event)
    {
        return $event->obj->saving_event();
    }
}