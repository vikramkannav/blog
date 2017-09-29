<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\EventCreatedCallback' => [
            'App\Listeners\EventCreatedListener'
        ],
        'App\Events\EventCreatingCallback' => [
            'App\Listeners\EventCreatingListener'
        ],
        'App\Events\EventDeletedCallback' => [
            'App\Listeners\EventDeletedListener'
        ],
        'App\Events\EventDeletingCallback' => [
            'App\Listeners\EventDeletingListener'
        ],
        'App\Events\EventRestoredCallback' => [
            'App\Listeners\EventRestoredListener'
        ],
        'App\Events\EventRestoringCallback' => [
            'App\Listeners\EventRestoringListener'
        ],
        'App\Events\EventSavedCallback' => [
            'App\Listeners\EventSavedListener'
        ],
        'App\Events\EventSavingCallback' => [
            'App\Listeners\EventSavingListener'
        ],
        'App\Events\EventUpdatedCallback' => [
            'App\Listeners\EventUpdatedListener'
        ],
        'App\Events\EventUpdatingCallback' => [
            'App\Listeners\EventUpdatingListener'
        ],
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
