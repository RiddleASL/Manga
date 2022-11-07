<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mockery\Undefined;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mangas = Manga::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('mangas.index')->with('mangas', $mangas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mangas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required|max:120',
            'description'=>'required',
            'author'=>'required',
            'created_at'=>'required',
            'updated_at'=>'nullable',
            'genre' => 'required',
            'chapters' => 'required',
            'user_id'=> 'nullable',
            'manga_image'=> 'file|image'
        ]);

        $manga_image = $request->file('manga_image');
        $extension = $manga_image->getClientOriginalExtension();
        $filename = date("Y-m-d-His") . '_' . $request->input('title') . '.' . $extension;

        $path = $manga_image->storeAs('public/images', $filename);

        Manga::create([
            'title' => $request->title,
            'author'=>$request->author,
            'description' => $request->description,
            'created_at'=> $request->created_at,
            'genre' => $request->genre,
            'chapters' => $request->chapters,
            'manga_image' => $filename,
            'user_id' => Auth::id()
        ]);

        return to_route('mangas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        //
        return view('mangas.show')->with('manga', $manga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        //
        return view('mangas.edit')->with('manga', $manga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manga $manga)
    {
        //
        //
        $request->validate([
            'title'=>'required|max:120',
            'description'=>'required',
            'author'=>'required',
            'genre' => 'required',
            'chapters' => 'required',
            'manga_image'=> 'file|image'
        ]);

        $manga_image = $request->file('manga_image');

        $manga = Manga::find($manga->id);
        
        $manga->title = $request->input('title');
        $manga->description = $request->input('description');
        $manga->author = $request->input('author');
        $manga->updated_at = $request->input('updated_at');
        $manga->genre = $request->input('genre');
        $manga->chapters = $request->input('chapters');
        if($manga_image != null){
            $extension = $manga_image->getClientOriginalExtension();
            $filename = date("Y-m-d-His") . '_' . $request->input('title') . '.' . $extension;

            $path = $manga_image->storeAs('public/images', $filename);
            
            $manga->manga_image = $filename;
        }else{}

        $manga->save();

        return to_route('mangas.show', $manga->id)->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        //
        $manga->delete();
        return to_route('mangas.index');
    }
}
