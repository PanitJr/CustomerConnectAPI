<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule as SysSchedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\CC\Loader;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\cc_object::class,
        Commands\cc_field::class,
        Commands\cc_user::class,
        Schedule\promotion_discount_salesforce::class,
        Schedule\sync_import_erp::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(SysSchedule $schedule)
    {
        //$schedule->command('sf:promotion_discount_salesforce')->daily();
        $schedule->call(function () {
            $users = DB::table('user')->get();
            $opportunities = DB::table('cc_opportunity')->where('status','>',0)->get();
            foreach ($users as $user){
                foreach ($opportunities as $opp)
                $items = DB::table('cc_item')
                    ->join('entitys','cc_item.id','=',$user.id)
                    ->where('status','<',2)
                    ->where('cc_item.opportunity','=',$opp.id)
                    ->get();
                    foreach ($items as $item){
                        $objectClass = 	Loader::getObject('Expense');
                        $objectModel = new $objectClass();
                        $objectModel->expensename = "test schedule";
                        $objectModel->save();
                }
            }
        })->everyMinute();
    }
}
