<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    public static function show(){
       $notes = Notes::orderBy('created_at','desc')->get();
       return view('/pages/myNote',compact('notes'));
    }

   

    public static function store(Request $request){
        // validate the form
       $validated = $request->validate([
         'Title' => 'required|max:255',
         'Note' => 'required|string'
       ]);


       // save the data to the database

       Notes::create([
          'title' => $validated['Title'],
          'note' => $validated['Note']
       ]);

       return redirect()->route('create');
    }

    public static function edit($id){
       $note = Notes::findOrFail($id);

       return view('note.edit', compact('note'));
    }

    public static function update(Request $request ,$id){

      $validated = $request->validate([
         'Title' => 'required',
          'Note' => 'required'
      ]);


      $note = Notes::findOrFail($id);
   
      $note->update([
          'title' => $validated['Title'],
           'note' => $validated['Note']
      ]);

      // rederict with success message
      return redirect()->route('myNote')->with('success', 'successfully Updated');
    }

    public static function destroy($id){
      $note = Notes::findOrFail($id);
      $title = $note->title;

      $note->delete();
      return redirect()->route('myNote')->with('success',"Succcessfully Deleted: $title");
    }

    
}   
