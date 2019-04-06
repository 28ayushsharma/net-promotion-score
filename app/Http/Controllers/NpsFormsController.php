<?php

namespace App\Http\Controllers;

use App\NpsForms;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NpsFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $npsForms  = NpsForms::all();
        return view('admin-panel.nps.index', compact('npsForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.nps.create');
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
            'title'     => 'required|max:255',
            'question'     => 'required|max:255'
            ];
        $messages = [
                'title.required'     => 'Please enter a title.',
                'question.required'     => 'Please enter a question.'
            ];
        $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }else{
            $data = NpsForms::create([
                'title'     => $request->get('title'), 
                'question'  => $request->get('question'), 
                'user_id'   => Auth::user()->id,
                ]);
            $request->session()->flash('status', 'success');
            $request->session()->flash('msg', 'Nps form added successfully');
            return redirect()->route('nps-forms.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nps  $nps
     * @return \Illuminate\Http\Response
     */
    public function show(Nps $nps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nps  $nps
     * @return \Illuminate\Http\Response
     */
    public function edit(Nps $nps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nps  $nps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nps $nps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nps  $nps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nps $nps)
    {
        //
    }
}
