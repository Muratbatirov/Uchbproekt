<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Balans;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostsStoreRequest;
class BalansController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function balans()
    {
     $balans = Balans::where('user_id', 1)->select('vid', 'summa')->limit(5)->orderBy('id')->get()->toJson();




            return $balans;
          
   
}



}
