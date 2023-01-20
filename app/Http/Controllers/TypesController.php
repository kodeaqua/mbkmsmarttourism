<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
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
        $types = Type::paginate(5);
        return view('types', compact('types'));
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
            'name' => ['required', 'max:16'],
            'weight' => ['required']
        ]);

        if (!$isValid) {
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        Type::create([
            'name' => $request->name,
            'weight' => $request->weight
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
            'name' => ['max:16'],
        ]);

        if (!$isValid) {
            return redirect()->back()->withErrors($isValid)->withInput();
        }

        $selected = Type::findOrFail($id);

        if ($request->name && $request->name != $selected->name && $request->name != " ") {
            $selected->update([
                'name' => $request->name
            ]);
        }

        if ($request->weight && $request->weight != $selected->weight && $request->weight != " ") {
            $selected->update([
                'weight' => $request->weight
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
