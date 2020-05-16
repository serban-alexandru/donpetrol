<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;

class SendOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send order to pos 15 minutes before the order should be delivered';

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

        \Log::info('Comenzi trimise la pos.');
    }
}
