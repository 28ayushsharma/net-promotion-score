<?php

namespace App\Http\Controllers;

use App\NpsKey;
use App\NpsForms;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NpsKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $npsKeys  = NpsKey::where('user_id', Auth::id())->with('nps_form')->get();
        return view('admin-panel.nps-keys.index', compact('npsKeys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $npsForms  = NpsForms::where('user_id', Auth::id())->pluck('title','id');
        return view('admin-panel.nps-keys.create', compact('npsForms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nps_form'     => 'required|unique:nps_code_keys,nps_form_id, 0 ,id,user_id,'.Auth::id()
            ];

        $validator = Validator::make($request->all(), $rules,[
            "nps_form.unique" => "Key is already generated for this Nps form."
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{
            $nps_key = sha1(time()).str_random(5);
            $data = NpsKey::create([
                'user_id'   => Auth::user()->id,
                'nps_code_key' => $nps_key, 
                'nps_form_id'  => $request->get('nps_form')
                ]);
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Keys generated Successfully');
            return redirect()->route('nps-key.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NpsKey  $npsKey
     * @return \Illuminate\Http\Response
     */
    public function show(NpsKey $npsKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NpsKey  $npsKey
     * @return \Illuminate\Http\Response
     */
    public function edit(NpsKey $npsKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NpsKey  $npsKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NpsKey $npsKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NpsKey  $npsKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(NpsKey $npsKey)
    {
        //
    }
}
