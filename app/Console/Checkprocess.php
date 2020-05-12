<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Information,App\Recode;
use Carbon\Carbon;

class Checkprocess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Checkprocess';

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
        $information = Information::where('process','6')->get();

        foreach ($information as $key => $value)
        {
             $recode = Recode::where('info_id', $value->id)->orderby('creacted_at','desc')->first();

             $last_day=carbon::parse($recode->creacted_at);
             $start_day = carbon::parse($value->updated_at);

             $day = $last_day->diffIndays($start_day, true);

             if($day > 7)
            {

                Information::where('id',$value->id)->update(['process'=>5]);
            }

        } 
    }
}
