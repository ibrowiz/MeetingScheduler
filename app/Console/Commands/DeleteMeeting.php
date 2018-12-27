<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Booking;

class DeleteMeeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:meeting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete meeting';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
          $rooms = Room::all();
             Booking::where('created_at', '<', Carbon::now()->subMinutes(15)->toDateTimeString())->each(function ($item) {
                $item->delete();
                });
    }
}
