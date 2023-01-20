<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = Village::paginate(10);
        return view('villages', compact('villages'));
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
        $isValid = $request->validate([
            'name' => ['required', 'max:24'],
        ]);

        if (!$isValid) {
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        Village::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Save success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isValid = $request->validate([
            'name' => ['max:24'],
        ]);

        if (!$isValid) {
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        $selected = Village::findOrFail($id);

        if ($request->name && $request->name != $selected->name && $request->name != " ") {
            $selected->update([
                'name' => $request->name
            ]);
        }

        return redirect()->back()->with('success', 'Save success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
