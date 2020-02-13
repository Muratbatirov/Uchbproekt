<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RasCategor;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use App\Daxod;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostsStoreRequest;
class DoxodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

          
   
    }
public function deystviy(){

 $deystviy = DB::table('daxod')
            ->join('daxcategor', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxod.user_id' )
            ->select( 'daxod.id' ,'daxod.summa' ,'daxcategor.nomi')
            ->where('users.id', 1) 
            ->orderBy('data', 'DESC')->limit(5)->get();

            return $deystviy;

}
public function deystviyper(){

 $deystviy = DB::table('daxod')
            ->join('daxcategor', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxod.user_id' )
            ->select( 'daxod.id' ,'daxod.summa' ,'daxcategor.nomi')
            ->where('users.id', 1) 
            ->orderBy('data', 'DESC')->limit(4)->get();

            return $deystviy;

}
public function udalit(Request $request){

     $doxodid = $request->get('id');  
      $res =Daxod::where('id',$doxodid)->delete();

           

}
public function redakt(Request $request){
        $doxodid = $request->get('doxid');  
 $deystviy = DB::table('daxod')
            ->join('daxcategor', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxod.user_id' )
            ->select( 'daxod.summa' ,'daxod.mesto' ,'daxcategor.nomi')
            ->where('users.id', 1 )->where('daxod.id', $doxodid )
            ->get()->first();

            return response()->json([
    'summa' => $deystviy->summa,
    'nomi' => $deystviy->nomi,
    'mesto' => $deystviy->mesto,
]);

            
            

}

public function doxodmeses(){

 $doxodmes= DB::table('daxod')
            ->join('daxcategor', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxod.user_id' )
            ->select(  'daxod.summa','daxod.data' ,'daxcategor.nomi')
            ->where('users.id', 1)->whereBetween('daxod.data', [Carbon::now()->subDays(30), Carbon::now()])
            ->orderBy('data')->get();
          
            return $doxodmes;

}


}
