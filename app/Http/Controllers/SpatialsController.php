<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Spatial;
use App\Models\Village;
use Illuminate\Http\Request;

class SpatialsController extends Controller
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
        $spatials = Spatial::with('village', 'type')->paginate(10);
        $villages = Village::all();
        $types = Type::all();
        return view('spatials', compact('spatials', 'villages', 'types'));
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
            'village_id' => ['required'],
            'type_id' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        if (!$isValid) {
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        Spatial::create([
            'village_id' => $request->village_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
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
        $selected = Spatial::findOrFail($id);

        if ($request->village_id && $request->village_id != $selected->village_id) {
            $selected->update([
                'village_id' => $request->village_id
            ]);
        }

        if ($request->type_id && $request->type_id != $selected->type_id) {
            $selected->update([
                'type_id' => $request->type_id
            ]);
        }

        if ($request->name && $request->name != $selected->name && $request->name != " ") {
            $selected->update([
                'name' => $request->name
            ]);
        }

        if ($request->address && $request->address != $selected->address && $request->address != " ") {
            $selected->update([
                'address' => $request->address
            ]);
        }

        if ($request->latitude && $request->latitude != $selected->latitude && $request->latitude != " ") {
            $selected->update([
                'latitude' => $request->latitude
            ]);
        }

        if ($request->longitude && $request->longitude != $selected->longitude && $request->longitude != " ") {
            $selected->update([
                'longitude' => $request->longitude
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
