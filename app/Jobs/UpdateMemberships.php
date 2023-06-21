<?php

namespace App\Jobs;

use \Carbon\Carbon;
use App\Models\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateMemberships implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * This Job finds all Membership records that have passed
     * their Expiry due date but are still marked as Active.
     * Then it updates the Membership to 'Expired'.
     *
     * It is scheduled to run once everyday at midnight.
     * 
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
