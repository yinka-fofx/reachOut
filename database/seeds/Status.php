<?php

use App\Cause;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $causes = Cause::all();

        foreach ($causes as $cause) {
            if(Carbon::now()->greaterThan(Carbon::parse($cause->Due_Date))) {
                $cause->Active = 1;
                $cause->save();
            }
        };
    }
}
