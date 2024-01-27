<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE',subscription_status='0' where cashtransactions.days ='30', users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>30 and subscription_status='1'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE',subscription_status='0' where cashtransactions.days ='90',  users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>90 and subscription_status='1'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE',subscription_status='0' where cashtransactions.days ='180',  users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>180 and subscription_status='1'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE',subscription_status='0' where  cashtransactions.days ='365', users.mode_of_payment='cash' and DATEDIFF(NOW(),users.s_created)>365 and subscription_status='1'");
          
           
        })->everyMinute();


        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE' where cashtransactions.days ='30',  users.mode_of_payment='paypal' and DATEDIFF(NOW(),users.s_created)>30 and subscription_status='0'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE' where  cashtransactions.days ='90', users.mode_of_payment='paypal' and DATEDIFF(NOW(),users.s_created)>90 and subscription_status='0'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE' where cashtransactions.days ='180'  users.mode_of_payment='paypal' and DATEDIFF(NOW(),users.s_created)>180 and subscription_status='0'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE' where cashtransactions.days ='365' users.mode_of_payment='paypal' and DATEDIFF(NOW(),users.s_created)>365 and subscription_status='0'");
          
           
        })->everyMinute();
        
        $schedule->call(function () {
            
            $result1 = DB::update("update users set subscription='NONE' where  users.subscription='TRIAL' and DATEDIFF(NOW(),users.s_created)>7 ");
          
           
        })->everyMinute();
        

        
        $schedule->call(function () {
            DB::table('test')->delete();
        })->everyMinute();
        
         $schedule->call(function () {
            
           // $result =  DB::selectOne("SELECT id FROM users where users.id IN (SELECT DISTINCT o_id from susers GROUP BY o_id HAVING COUNT(*) >= 1) and users.subscription = 'NONE'");
        $r = DB::select("SELECT id FROM users where users.id IN (SELECT DISTINCT o_id from susers GROUP BY o_id HAVING COUNT(*) > 2) and users.subscription = 'BASIC'");
       
        $arr=array();
        foreach($r as $a)
        {
          array_push($arr,  $a->id);   
        }
       $arr =implode(",",$arr);
       if(!empty($arr))
        DB::delete("DELETE FROM susers where susers.o_id in ($arr) order by susers.id desc LIMIT 1");
           
        })->everyMinute();



        $schedule->call(function () {
            
            // $result =  DB::selectOne("SELECT id FROM users where users.id IN (SELECT DISTINCT o_id from susers GROUP BY o_id HAVING COUNT(*) >= 1) and users.subscription = 'NONE'");
         $r = DB::select("SELECT id FROM users where users.id IN (SELECT DISTINCT o_id from susers GROUP BY o_id HAVING COUNT(*) > 6) and users.subscription = 'ESSENTIAL'");
        
         $arr=array();
         foreach($r as $a)
         {
           array_push($arr,  $a->id);   
         }
        $arr =implode(",",$arr);
        if(!empty($arr))
         DB::delete("DELETE FROM susers where susers.o_id in ($arr) order by susers.id desc LIMIT 1");
            
         })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
