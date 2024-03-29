<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DaxCategor;
use App\RasCategor;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostsStoreRequest;
class ToolsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function daxtoolcat()
    {
     $daxtoolcat = DaxCategor::where('user_id', 1)->select('id', 'nomi')->orderBy('id')->get()->toJson();

       
 

            return $daxtoolcat;
          
   
    }
    public function rastoolcat()
    {
     $rastoolcat = RasCategor::where('user_id', 1)->select('id', 'nomi')->orderBy('id')->get();

            return $rastoolcat;

    }
     public function daxtoolcatpag(Request $request)
    {

        $daxskip= $request->get('daxskip')*5;  
     $daxtoolcat = DaxCategor::where('user_id', 1)->select('id', 'nomi')->orderBy('id')->skip($daxskip)->take(5)->get()->toJson();

            return $daxtoolcat;

    }
public function catdoxod(Request $request)
    {


      $nomi = $request->get('nomi');   
           $categ = new DaxCategor;

    $categ->nomi = $nomi;
    $categ->user_id = 1;

    $categ->save();
   
   }
   public function catrasxod(Request $request)
    {
      $nomi = $request->get('nomi');   
           $categ = new RasCategor;

    $categ->nomi = $nomi;
    $categ->user_id = 1;

    $categ->save();
   
   }
   public function catdoxred(Request $request)
    {
      $nomi = $request->get('nomi');
      $id =   $request->get('id'); 
     $daxcategor= DaxCategor::where('id', $id)->first();
      $daxcategor->nomi=$nomi;
      $daxcategor->save();
          
   }
   public function catrasred(Request $request)
    {
      $nomi = $request->get('nomi');
      $id =   $request->get('id'); 
     $daxcategor= RasCategor::where('id', $id)->first();
      $daxcategor->nomi=$nomi;
      $daxcategor->save();
          
   }
   public function catredmat(Request $request)
    {
      $id = $request->get('catdoxid');
      
     $daxcategor= DaxCategor::where('id', $id)->first();
      return $daxcategor;
          
   }
   public function catredmatras(Request $request)
    {
      $id = $request->get('catdoxid');
      
     $daxcategor= RasCategor::where('id', $id)->first();
      return $daxcategor;
          
   }
public function udaltooldox(Request $request)
    {
       $catdoxid = $request->get('id');  
      $res =DaxCategor::where('id',$catdoxid)->first();
        $res->daxod()->delete(); 
         $res->delete();
   }
public function udaltoolras(Request $request)
    {
       $catdoxid = $request->get('id');  
      $res =RasCategor::where('id',$catdoxid)->first();
        $res->rasxod()->delete(); 
         $res->delete();
   }

  }
