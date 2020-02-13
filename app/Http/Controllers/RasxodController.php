<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RasCategor;
use App\Rasxod;
use App\Balans;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostsStoreRequest;
class RasxodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

          
    return view('home');
}
public function rasxod(){

$rasxod = DB::table('rascategor')
            ->join('rasxod', 'rascategor.id', '=', 'rasxod.ras_categor_id' )
            ->join('users', 'users.id', '=', 'rascategor.user_id' )
            ->select( 'rascategor.nomi',  DB::raw("SUM(rasxod.summa) as count") )
            ->where('rascategor.user_id', 1)
            ->groupBy('rascategor.nomi')->orderBy('count', 'DESC')->get()->toArray();

            return $rasxod;

}
public function dataras(){
  $rascategor = RasCategor::where('user_id', 1)
               ->select('nomi')
               ->get()->toArray();

     return $rascategor;
}
public function rasqoshish(PostsStoreRequest $request){
   
        
       

       $sum = $request->get('rassumma');        
       $nomi = $request->get('rasnomi');
         $time = $request->get('time');
         $mesto= $request->get('rasmesto');
       $d = new DateTime($time);
       $d ->add(new DateInterval("PT5H"));
       $idcat= RasCategor::where('nomi', $nomi)->select('id')->first()->id;

        $rasxod = new Rasxod;
        $rasxod->summa = $sum;
        $rasxod->user_id= 1;
        $rasxod->data= $d;
        $rasxod->ras_categor_id=$idcat;
        $rasxod->mesto= $mesto;
      
        $rasxod->save();

        


}
public function rasmesto(){
           $datarasmesto= Balans::where('user_id', 1)
               ->select('vid')
               ->get()->toArray();

          return $datarasmesto;
}

}
