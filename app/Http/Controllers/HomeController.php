<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaxCategor;
use App\Daxod;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     // $name = [];
      // $user = User::find(1);
       //foreach($zapros->daxcategor()->first() as $daxcategor){
         //   $i=0;
           //    $name[$i]=$daxcategor->name;
             //  $i++;
          
        //}
      // echo $user->daxcategor()->where('id', 2 )->first()->name; 

          
    return view('home');
}
public function resdaxod(){

$daxod = DB::table('daxcategor')
            ->join('daxod', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxcategor.user_id' )
            ->select( 'daxcategor.nomi',  DB::raw("SUM(daxod.summa) as count") )
            ->where('users.id', 1)
            ->groupBy('daxcategor.nomi')->orderBy('count', 'DESC')->get()->toArray();

            return $daxod;

}
public function datadaxcategor(){
  $daxcategor = DaxCategor::where('user_id', 1)
               ->select('nomi')
               ->get()->toArray();

     return $daxcategor;
}
public function qoshish(Request $request){
  
       

       $sum = $request->get('balans');        
       $nomi = $request->get('nomi');
       
       $idcat= DaxCategor::where('nomi', $nomi)->select('id')->first()->id;

        $daxod = new Daxod;
        $daxod->summa = $sum;
        $daxod->user_id= 1;
        $daxod->dax_categor_id=$idcat;
        $daxod->mesto= 'plastik_2';
      
        $daxod->save();

        


}

}
