<?php

namespace App\Observers;

use App\Models\Contacts;
use App\Notifications\WelcomeEmail;

class ContactObserver
{
    /**
     * Handle the Contacts "created" event.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return void
     */
    public function created(Contacts $contacts)
    {
        //
        $contacts->notify(new WelcomeEmail());
    }

    /**
     * Handle the Contacts "updated" event.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return void
     */
    public function updated(Contacts $contacts)
    {
        //
    }

    /**
     * Handle the Contacts "deleted" event.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return void
     */
    public function deleted(Contacts $contacts)
    {
        //
    }

    /**
     * Handle the Contacts "restored" event.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return void
     */
    public function restored(Contacts $contacts)
    {
        //
    }

    /**
     * Handle the Contacts "force deleted" event.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return void
     */
    public function forceDeleted(Contacts $contacts)
    {
        //
    }
}
