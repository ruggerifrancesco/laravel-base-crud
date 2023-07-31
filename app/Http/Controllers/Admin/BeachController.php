<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beach;
use Illuminate\Http\Request;
use App\Http\Requests\BeachRequest;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beaches = Beach::paginate(10);

        return view('admin.beaches.index', compact('beaches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.beaches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeachRequest $request)
    {
        $beaches = $request->all();
        $beaches['has_volley'] = $request->has('has_volley') ? 1 : 0;
        $beaches['has_football'] = $request->has('has_football') ? 1 : 0;


        $beach = new Beach();
        $beach->fill($beaches);

        // Attempt to save the beach
        if ($beach->save()) {
            // If the save is successful, redirect to the index page
            return redirect()->route('admin.beaches.index');
        } else {
            // If the save fails, redirect back to the create page with the validation errors
            return redirect()->route('admin.beaches.create')->withErrors('Failed to save the beach.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Int $id)
    {
        $beach = Beach::findOrFail($id);

        return view('admin.beaches.show', compact('beach'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Int $id)
    {
        $beach = Beach::findOrFail($id);

        return view('admin.beaches.edit', compact('beach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (BeachRequest $request, Int $id)
    {
        $beaches = $request->all();
        $beaches['has_volley'] = $request->has('has_volley') ? 1 : 0;
        $beaches['has_football'] = $request->has('has_football') ? 1 : 0;

        $beach = Beach::findOrFail($id);
        $beach->fill($beaches);

        // Attempt to save the beach
        if ($beach->save()) {
            // If the save is successful, redirect to the show page
            return redirect()->route('admin.beaches.show', $beach->id);
        } else {
            // If the save fails, redirect back to the edit page with the validation errors
            return redirect()->route('admin.beaches.edit')->withErrors('Failed to save the beach.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Int $id)
    {
        $beach = Beach::findOrFail($id);
        $beach->delete();
        return redirect()->route("admin.beaches.index");
    }

    public function trashed ()
    {
        $beaches = Beach::onlyTrashed()->paginate(10);
        return view('admin.beaches.trashed', compact('beaches'));
    }

    public function restore (Int $id)
    {
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->restore();
        return redirect()->route('admin.beaches.index')->with('restored', $beach->name);
    }
}
