<?php

namespace App\Listeners;

use App\Events\TestingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TestingListener
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \App\Events\TestingEvent  $event
   * @return void
   */
  public function handle(TestingEvent $event)
  {
    Log::error($event->user->id);
    dd($event->user->email);
  }
}
