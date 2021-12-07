<?php

namespace App\Listeners;

use App\Events\RegisteredBorrowerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class RegisterBorrowerRegisteredAct
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
   * @param  \App\Events\RegisteredBorrowerEvent  $event
   * @return void
   */
  public function handle(RegisteredBorrowerEvent $event)
  {
    Log::alert('Testing an logs');
  }
}
