<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaxCategor;
use App\Daxod;
use App\Balans;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
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
public function resdaxod(Request $request){
    $raznitsa = $request->get('raznitsa');
    $curmeses= now()->month;
    $meses;$god;
    if ($raznitsa == 24 ){
      $god = 2020;
      $meses = $curmeses;
    }

    elseif ($raznitsa > 24 ){
        $god = 2020;
        $meses =  $curmeses + ($raznitsa-24);
    }
    elseif ($raznitsa <= (24-$curmeses) ) {
      $god = 2019;
      $meses =12-((24-$curmeses) - $raznitsa);
    }
    else {
      $god = 2020;
      $meses =24-$raznitsa;
    }
    
    $daxod = DB::table('daxcategor')
            ->join('daxod', 'daxcategor.id', '=', 'daxod.dax_categor_id' )
            ->join('users', 'users.id', '=', 'daxcategor.user_id' )
            ->select( 'daxcategor.nomi',  DB::raw("SUM(daxod.summa) as count") )
            ->where('users.id', 1) ->whereYear('data', '=', $god)->whereMonth('data', '=', $meses)
            ->groupBy('daxcategor.nomi')->orderBy('count', 'DESC')->limit(5)->get()->toArray();

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
         $time = $request->get('time');
         $mesto= $request->get('mesto');
       $d = new DateTime($time, new DateTimeZone('Asia/Tashkent'));
       $d ->add(new DateInterval("PT5H"));
       $idcat= DaxCategor::where('nomi', $nomi)->select('id')->first()->id;

        $daxod = new Daxod;
        $daxod->summa = $sum;
        $daxod->user_id= 1;
        $daxod->data= $d;
        $daxod->dax_categor_id=$idcat;
        $daxod->mesto= $mesto;
      
        $daxod->save();

        


}
public function qoshishred(Request $request){
  
       

       $sum = $request->get('balans');        
       $nomi = $request->get('nomi');
         $time = $request->get('time');
         $mesto= $request->get('mesto');
         $id = $request->get('id');
       $d = new DateTime($time, new DateTimeZone('Asia/Tashkent'));
       $d ->add(new DateInterval("PT5H"));
       $idcat= DaxCategor::where('nomi', $nomi)->select('id')->first()->id;

        $daxod = Daxod::where('id', $id)->first();
        $daxod->summa = $sum;
        $daxod->user_id= 1;
        $daxod->data= $d;
        $daxod->dax_categor_id=$idcat;
        $daxod->mesto= $mesto;
      
        $daxod->save();

        


}
public function mesto(){
           $datamesto= Balans::where('user_id', 1)
               ->select('vid')
               ->get()->toArray();

          return $datamesto;
}


}
