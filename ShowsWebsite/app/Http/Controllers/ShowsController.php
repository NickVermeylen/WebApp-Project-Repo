<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Storage;

class ShowsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $shows = File::all();

        return view("shows.index") -> with("shows", $shows);
    }
    //return view met form om shows toe te voegen
    public function create()
    {
        return view("shows.create",compact("create"));
    }

    //file opslaan in database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'description'=>'required',
            'path'=>'required'
        ],[
            'name.required'=>'Gelieve een naam in te geven.',
            'description.required'=>'Gelieve een bescrhijving in te geven.',
            'path.required'=>'Gelieve een file in te geven.'
        ]);

        $show = new File($request->all());
        $show->user_id = Auth::id();
        $file = request()->file('path');
        $file->storeAs('docs/' . auth::id(), $show->name . '.pdf');


        //All het gekloot ervoor
        //return dd($show);
        //allemaal automatisch
        /*$show->name = Input::get('name');
        $show->description = Input::get('description');
        $show->path = Input::get('path');*/

        //$newFile = new File (request()->all());
        //return dd($newFile);
        //$newFile->storeAs('shows/' . Auth::id(), $show->name);
        //return dd($newFile);
        /*Storage::put(
            '/docs/'.Auth::id().$show->path,
            $show);*/
            //file_get_contents($request->file('filename')->getRealPath()));
        //dd($show);
        //$show->storeAs('docs/' . auth::id(), $show->name);

        $show->save();
        Session::flash('success_upload', 'Upload gelukt');
        return Redirect::to('shows');
    }
    //specifieke show laten zien
    public function show($id)
    {
        $show = File::find($id);
        return view('shows.show')->with('show', $show);
    }

    //form for edit
    public function edit($id)
    {
        $show = File::find($id);
        return view('shows.edit')->with('show', $show);
    }

    public function update(Request $request, File $show)
    {
        //$new = new File($request->all());
        //$show->update($new);
        Session::flash('message', 'Successfully updated show!');
        return Redirect::to('shows');
    }

    public function destroy($id)
    {
        $show = File::find($id);
        if($show->user_id == Auth::id() || Auth::id() == 1)
        {
            $show->delete();
            Storage::delete('docs/'.$show->user_id.'/'.$show->name.'.pdf');
            Session::flash('message', 'Successfully deleted the show!');
            return Redirect::to('shows');
        }
        else{
            Session::flash('message', 'Not yours to delete');
            return Redirect::to('shows');
        }

    }

}
