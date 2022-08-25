<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NoteModel;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
   public function notebook()
   {
    return response()->json(NoteModel::get(), 200);
   }
   public function notebookById($id)
   {
    return response()->json(NoteModel::find($id), 200);
   }
   public function addNote(Request $req)
   {
      $rules = [
         'surname' => 'required',
         'name' => 'required',
         'patronymic' => 'required',
         'tel_number' => 'integer|min:10',
         'email_adress' => 'required|email',
         'birthday' => 'date_format:Y-m-d',
     ];
     $validator = Validator::make($req->all() ,$rules);
     if ($validator->fails()){
         return response()->json($validator->errors(),400);
     }
    $notebook = NoteModel::create($req->all());
    return response()->json($notebook, 201);
   }
   public function notebookEdit(Request $req, NoteModel $notebook)
   {
      $rules = [
         'tel_number' => 'integer|min:10',
         'email_adress' => 'email',
         'birthdate' => 'date_format:Y-m-d',
     ];

     $validator = Validator::make($req->all() ,$rules);

     if ($validator->fails()){
         return response()->json($validator->errors(),400);
     }
      $notebook->update($req->all());
      return response()->json($notebook, 200);
   }
   public function notebookDelete($req)
   {
      NoteModel::find($req)->delete();
      return response()->json($req, 204);
   }
}
