<?php

namespace App\Http\Controllers;

use App\Phonebook as Phonebook;
use Illuminate\Http\Request;
use Validator;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function getData() {
        $phonebooks = Phonebook::orderBy('name', 'ASC')->get();
        return $phonebooks;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:phonebooks',
            'phone' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $pb = new Phonebook;
        $pb->name = $request->name;
        $pb->email = $request->email;
        $pb->phone = $request->phone;
        $pb->save();
        return $pb;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phonebook $phonebook)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:phonebooks,email,'.$request->id,
            'phone' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $pb = Phonebook::find($request->id);
        $pb->name = $request->name;
        $pb->email = $request->email;
        $pb->phone = $request->phone;
        $pb->save();
        return "success";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        $phonebook = Phonebook::find($phonebook->id);
        $phonebook->delete();
        return "success";
    }
}
