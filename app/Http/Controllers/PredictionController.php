<?php

namespace App\Http\Controllers;

use App\User;
use App\Prediction;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PredictionController extends BaseController {

	public function getIndex(){
		$predictions = Prediction::orderBy('created_at','ref_date', 'prediction', 'name', 'comment')->get();
        $prediction_code = Prediction::lists('prediction','id');
        $today = Carbon::now()->format('Y/m/d');
        $tomorrow = Carbon::tomorrow()->format('Y/m/d');
    	return view('prediction',compact('predictions','prediction_code','today','tomorrow'));
    }

    public function postCreate(){
        $predictions   = Input::only('ref_date', 'prediction', 'name', 'comment');
        Prediction::create($predictions);
        return Redirect::to('/prediction');
    }

    public function postUpdate(){
        $predictions   = Input::only('ref_date', 'prediction', 'name', 'comment');
        $model  = Prediction::find(Input::get('id'));
        $model->update($predictions);
        return Redirect::to('/prediction');
    }

    public function postDelete(){
        Prediction::destroy(Input::only('id'));
        return Redirect::to('/prediction');
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