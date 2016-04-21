<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Forecast;
use Illuminate\Http\Request;


class ForecastController extends BaseController {

// 	public function index()
// 	{
// 		return view('user');
// 	}
	
	public function getIndex(){
		//$users = "megumus";
		$forecasts = Forecast::orderBy('ref_date', 'code', 'strategy')->get();
//		$first_name = "さかぐち";
//    	$last_name  = "めぐむ";
    	//make('user')->with('users', User::orderBy('name', 'desc')->get()
    	return view('forecast',compact('forecasts'));
    	
		//return View::make('user')->with('users', User::orderBy('name', 'desc')->get());
    }

    public function postCreate(){
        $forecast   = Input::only('ref_date', 'code', 'strategy', 'forecast', 'unit');
        Forecast::create($forecast);
        return Redirect::to('/forecast');
    }

    public function postUpdate(){
        $forecast   = Input::only('ref_date', 'code', 'strategy', 'forecast', 'unit');
        $model  = Forecast::find(Input::get('id'));
        $model->update($forecast);
        return Redirect::to('/forecast');
    }

    public function postDelete(){
        Forecast::destroy(Input::only('id'));
        return Redirect::to('/forecast');
    }

    public function getAnalysis(Request $request){

        $ref_date = $request->input('ref_date');
        $code = $request->input('code');
        $strategy = $request->input('strategy');
        $unique_parameter = $request->input('_');
//echo 'ref_date = ['.$ref_date.'], ';

//$getday = date('Y-m-d',strtotime($ref_date));
//echo 'getday = ['.$getday.'], ';


        $forecasts = Forecast::where('ref_date', '=', date('Y-m-d',strtotime($ref_date)))->
                               where('code', '=', $code)->
                               where('strategy', '=', $strategy)->first();

/*
echo 'forecasts = ['.$forecasts.'], ';
foreach( $forecasts as $forecast) {
    echo $forecast->ref_date;
    echo $forecast->forecast;
}
*/
//echo 'ref_date = ['.$forecasts->ref_date.'], ';
//echo 'forecast = ['.$forecasts->forecast.'], ';


        $return = array( 'ref_date' => $forecasts->ref_date
                        ,'forecast' => $forecasts->forecast );
//        $return = array( 'ref_date' => '2105/12/21'
//                        ,'forecast' => '-1' );

//        $ret_val = json_encode($return);

        return json_encode($return);
        
    }

}