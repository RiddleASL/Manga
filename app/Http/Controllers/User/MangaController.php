<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // Grabbing all the information from the database using the id of the authenticated user who is currently logged in as a foreign key,
        // attempting to grab all mangas for that user (if any), Ordered by the most recently updated and only displaying 5 per page.
        // Returning the manga.index sends us to the webpage with the information we just pulled
        // $mangas = DB::table('mangas')->latest('updated_at')->paginate(5);
        $mangas = Manga::with('publisher')->get();
        return view('user.mangas.index')->with('mangas', $mangas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Link to the create page
        return view('user.mangas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Using validate allows us to set requirments that must be met for each field we wish to fill within the database.
        $request->validate([
            'title'=>'required|max:120',
            'description'=>'required',
            'author'=>'required',
            'created_at'=>'required',
            'updated_at'=>'nullable',
            'genre' => 'required',
            'chapters' => 'required',
            'user_id'=> 'nullable',
            'publisher_id'=> 'required',
            'manga_image'=> 'file|image'
        ]);

        // Creating a new unique image file name allows errors from occuring with imaged having the same name
        // Pulling the image and the extension is uses (png, jpg, ect.) then using the date and time to create a unique name
        $manga_image = $request->file('manga_image');
        $extension = $manga_image->getClientOriginalExtension();
        $filename = date("Y-m-d-His") . '_' . $request->input('title') . '.' . $extension;

        // Saving the image in the images folder within the public folder we linked previously with the storage folder using "php artisan storage:link"
        $path = $manga_image->storeAs('public/images', $filename);

        // Finally, once validated and image file name was created, all information is pushed through here to get uploaded into the database
        // creating a new row of information
        Manga::create([
            'title' => $request->title,
            'author'=>$request->author,
            'description' => $request->description,
            'created_at'=> $request->created_at,
            'genre' => $request->genre,
            'chapters' => $request->chapters,
            'manga_image' => $filename,
            'user_id' => Auth::id(),
            'publisher_id'=> $request->publisher_id
        ]);

        // Once new item is made, send user back to index page
        return to_route('user.mangas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        // From the index page, Send user to a page and display the manga the user clicked on
        return view('user.mangas.show')->with('manga', $manga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        // From the show page, Send user to the edit page and bring the information from that manga with it
        return view('user.mangas.edit')->with('manga', $manga);
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
        // Very similar to the create function
        
        // Using validate allows us to set requirments that must be met for each field we wish to fill within the database.        
        $request->validate([
            'title'=>'required|max:120',
            'description'=>'required',
            'author'=>'required',
            'genre' => 'required',
            'chapters' => 'required',
            'manga_image'=> 'file|image'
        ]);

        // Running into errors at home when doing this section i decided to try another method i reserached

        // First pulling the image file but not doing anything till later in the code
        $manga_image = $request->file('manga_image');

        // Creating a new array ith all the information from the database, filtering by the id of the manga we pulled in from the edit page
        $manga = Manga::find($manga->id);
        
        // Similar to the Create, this sets the field you wish to change then lets you change its value
        // For manga image, using an if statement allows me to check if the user had uploaded a new image that they wish to use to update
        // If they had left the file input empty, the image of that row in the database will remain the same
        // If an image file had been uploaded, creating a unique file name then saving within the public images folder before updateing the database
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

        // Once updated, send user to the show page for the manga they had just updated
        return to_route('user.mangas.show', $manga->id)->with('success', 'Book updated successfully');
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
        // With the information pulled in from the show page, within the database, delete that manga and head back to index page
        $manga->delete();
        return to_route('user.mangas.index');
    }
}
