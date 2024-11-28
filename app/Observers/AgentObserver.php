<?php

namespace App\Observers;

use App\Mail\AgentCreatedMail;
use App\Models\Agent;
use Illuminate\Support\Facades\Mail;

class AgentObserver
{
 
    public function created(Agent $agent)
    {
        Mail::to('sirojiddintojinazarov5@gmail.com')->send(new AgentCreatedMail($agent));
    }

    public function updated(Agent $agent): void
    {
        //
    }

    public function deleted(Agent $agent): void
    {
        //
    }


    public function restored(Agent $agent): void
    {
        //
    }


    public function forceDeleted(Agent $agent): void
    {
        //
    }
}
