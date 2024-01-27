<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;
class everyminute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        
        DB::update("update users set subscription='NONE',subscription_status='0' where users.subscription='TRIAL' and DATEDIFF(NOW(),users.s_created)>7");
        DB::delete("delete from test");
        DB::update("update users,cashtransactions set users.subscription='NONE',users.subscription_status='0' where cashtransactions.days ='30' and users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>30 and subscription_status='1'");
        DB::update("update users,cashtransactions set users.subscription='NONE',users.subscription_status='0' where cashtransactions.days ='90' and users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>90 and subscription_status='1'");
        DB::update("update users,cashtransactions set users.subscription='NONE',users.subscription_status='0' where cashtransactions.days ='180' and users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>180 and subscription_status='1'");
        DB::update("update users,cashtransactions set users.subscription='NONE',users.subscription_status='0' where cashtransactions.days ='365' and users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>365 and subscription_status='1'");
        DB::update("update susers,users set susers.status='0 'where users.id = susers.o_id and users.subscription ='NONE' and users.subscription_status='0'");
    }
}
