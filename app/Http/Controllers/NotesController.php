<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public static function show(){

      // get the current user
      $user = Auth::user()->id;

       $notes = Notes::all()->where('user_id', $user);
       
       return view('/pages/myNote',compact('notes'));
    }



    public static function store(Request $request){
        // validate the form
       $validated = $request->validate([
         'Title' => 'required|max:255',
         'Note' => 'required|string'
       ]);


      //  Get The Current User

      $user = Auth::user()->id;
       // save the data to the database
       Notes::create([
          'title' => $validated['Title'],
          'note' => $validated['Note'],
          'user_id' => $user
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
      return to_route('myNote')->with('success', 'successfully Updated');
    }

    public static function destroy($id){
      $note = Notes::findOrFail($id);
      $title = $note->title;

      $note->delete();
      return to_route('myNote')->with('success',"Succcessfully Deleted: $title");
    }


}
