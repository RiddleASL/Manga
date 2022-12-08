<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $publishers = Publisher::all();
        return view('admin.publishers.index')->with('publishers', $publishers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Link to the create page
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
        ]);

        Publisher::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return to_route('admin.publishers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()){
            return abort(403);
        }
        return view('admin.publishers.show')->with('publisher', $publisher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher) 
    {
        return view('admin.publishers.edit')->with('publisher', $publisher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);


        $publisher = Publisher::find($publisher->id);
        $publisher->name = $request->input('name');
        $publisher->address = $request->input('address');
        $publisher->save();

        return to_route('admin.publishers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return to_route('admin.publishers.index');
    }
}
