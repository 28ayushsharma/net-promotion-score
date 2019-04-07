<?php

namespace App\Http\Controllers;

use App\EmailNps;
use App\NpsForms;
use App\NpsKey;
use App\NpsCollection;

use Auth;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailNpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $npsForms  = NpsForms::where('user_id', Auth::id())->pluck('title','id');
        return view('admin-panel.email_nps.index', compact('npsForms'));
    }

    /**
     * 
     */
    function emailedNps(Request $request,$survey_token){
        $data = NpsCollection::where("survey_token", $survey_token)
        ->where("submitted_on",null)
        ->first();
        $is_filled = false;
        if(!empty($data)){
            $is_filled = false;
        }else{
            $is_filled = true;
        }
        return view('nps_form',compact("survey_token","is_filled"));
    }

    function saveSurvey(Request $request){
        $data = NpsCollection::where("survey_token",$request->get("survey_token"))
            ->where("submitted_on",null)
            ->first();
        if(!empty($data)){
            $data->update([
                "rating"  =>  $request->get("rating"),
                "remark"  =>  $request->get("remark"),
                "submitted_on"  =>  date("Y-m-d H:i:s")
            ]);
        }
        $is_filled = true;
        return view('nps_form',compact("is_filled"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'nps_form'      => 'required',
            'emails'        => 'required|array|between:1,5'
            ];

        $validator = Validator::make($request->all(), $rules);

        $emails["email"] = array_map('trim', explode(',', $request->get("emails") ));
        $emailValidator = Validator::make($emails, [
            'email.*' => 'email|unique:nps_collection,email, 0 ,id,nps_form_id,'.$request->get("nps_form").',user_id,'.Auth::id()
        ],[
            'email.*' => " :input : Already Sent OR Not a valid email address"
        ]);

        if ($validator->fails() || $emailValidator->fails()){
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }else{
                return back()->withErrors($emailValidator)->withInput();
            }
        }else{
            $emails = explode(",", $request->get("emails"));
            if(count($emails) > 0){
                foreach($emails as $email){
                    $survey_token = sha1(time()).str_random(5);
                    EmailNps::create([
                        "user_id"       => Auth::id(),
                        "nps_form_id"   => $request->get("nps_form"),
                        "email"         => $email,
                        "survey_token"  => $survey_token
                    ]);

                    NpsCollection::create([
                        "user_id"       => Auth::id(),
                        "nps_form_id"   => $request->get("nps_form"),
                        "email"         => $email,
                        "survey_token"  => $survey_token,
                    ]);

                    $link = $request->root().'/nps/'.$survey_token;
                    
                    // $data = array('link'=> $link );
                    // Mail::send('emails.template', $data, function($message) use ($email) {
                    //     $message->to($email)->subject('Net Promotion Survey');  
                    // });
                }
            }
        }

        $request->session()->flash('status', 'success');
        $request->session()->flash('msg', 'Nps Survey Successfully sent.');
        return redirect()->route("email-nps.index");
    }


    public function getWidget(Request $request){
        $nps_key      =   $request->get("nps_key");
        $widgetData   =   NpsKey::where("nps_code_key",$nps_key)->with('nps_form')->first();
        return view('widget', compact("widgetData"));
    }

    /**
     * store widget
     */
    public function storeWidget(Request $request){
        $keyData   =   NpsKey::where("nps_code_key",$request->get("nps_key"))->first();
        $rules = [
            'rating'  => 'required',
            'nps_key' => 'required',
            'email'   => 'required|email'
            ];

        $validator = Validator::make($request->all(), $rules);
        $filledValidator = Validator::make(["email" => $request->get("email")],[
            'email'  => 'unique:nps_collection,email, 0 ,id,nps_form_id,'.$keyData->nps_form_id.',user_id,'.$keyData->user_id
        ] );

        if($validator->fails() || $filledValidator->fails()){
            if($validator->fails()){
                return response()->json([
                    'status' => 100,
                    'error'  => $validator->errors()
                ]);
            }else{
                return response()->json([
                    'status' => 102,
                    'error'  => $filledValidator->errors()
                ]);
            }
        }else{
            NpsCollection::create([
                "user_id"       => $keyData->user_id,
                "nps_form_id"   => $keyData->nps_form_id,
                "email"         => $request->get("email"),
                "remark"         => $request->get("remark"),
                "submitted_on"  =>  date("Y-m-d H:i:s"),
            ]);
        }
        return response()->json([
            'status' => 200,
            'msg'  => "Survey subbmitted successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailNps  $emailNps
     * @return \Illuminate\Http\Response
     */
    public function show(EmailNps $emailNps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailNps  $emailNps
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailNps $emailNps){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailNps  $emailNps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailNps $emailNps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailNps  $emailNps
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailNps $emailNps)
    {
        //
    }
}
