<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Salary;
use App\Models\Target;
use App\Models\UserToTarget;
use App\Models\Reminder;
use Mail;
use App\Mail\TargetReminder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);

         // $month=array('jan','feb','mar','apl','may','jun','jul','aug','sep','oct','nov','dec');
         //                        $date=date('m');
         //                        $newDate=explode("0", $date);
         //                        dd($date);
        //dd(date('F'));

       //////
        if((int)date('d')==1){

        

        if((int)date('m')==1){
            

            //already inserted or not
         @$check=Salary::where('month_id',12)->where('year',(int)date('Y')-1)->count();
          if(@$check<1){
            @$a=UserToTarget::where('target_month',12)->where('target_year',(int)date('Y')-1)->get();

            foreach($a as $key=> $val){
                    //fetching salary
                @$targetDetails=Target::where('month_id',12)->where('year',(int)date('Y')-1)->where('from_target','<=',$val->user_target_achived)->where('to_target','>=',$val->user_target_achived)->first();
                    
                    //insert data to salary
                    $sal=new Salary();
                    $sal->user_id=@$val->user_id;
                    $sal->month_id=@$val->target_month;
                    $sal->salary=@$targetDetails->salary;
                    $sal->year=@$val->target_year;
                    $sal->target_achive=@$val->user_target_achived;
                    $sal->save();
            }

                  //update target status to expiry
          Target::where('month_id',12)->where('year',(int)date('Y')-1)->update(['status'=>'E']);

          }        
        }


        else{
            @$check=Salary::where('month_id',(int)date('m')-1)->where('year',(int)date('Y'))->count();
            if($check<1){
             @$a=UserToTarget::where('target_month',(int)date('m')-1)->where('target_year',(int)date('Y'))->get();
          //dd($a);
         foreach($a as $key=> $val){

            //fetching salary
            $targetDetails=Target::where('month_id',(int)date('m')-1)->where('year',(int)date('Y'))->where('from_target','<=',$val->user_target_achived)->where('to_target','>=',$val->user_target_achived)->first();

            $sal=new Salary();
            $sal->user_id=@$val->user_id;
            $sal->month_id=@$val->target_month;
            $sal->salary=@$targetDetails->salary;
            $sal->year=@$val->target_year;
            $sal->target_achive=@$val->user_target_achived;
            $sal->save();
         }
         Target::where('month_id',(int)date('m')-1)->where('year',(int)date('Y'))->update(['status'=>'E']);
        }

        }
        /////

    }



     $check = Reminder::where('month',date('m'))->where('year',date('Y'))->first();
     if (@$check==null) {
         $register = new Reminder;
         $register->month = date('m');
         $register->year = date('Y');
         $register->save();
         if (date('d')==25) {
             $data = [];
            Mail::send(new TargetReminder($data));
         }
     }



    }
}
