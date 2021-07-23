<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// -----------------------------------------------------> PAGES WITHOUT AN ASSOCIATED ENTITY 
class PageController extends Controller
{
    public function index()
 {
   
    return view('guests.welcome');
 }
 public function about()
 {
   return view('guests.about');
 }
 public function contacts()
 {
   return view('guests.contacts');
 }

 public function sendContactForm(Request $request)
 {
  // ddd($request->all());
  $validatedData = $request->validate([
    "full_name" => "required",
    "email" => "required | email",
    "message" =>"required",
  ]);
  ddd($validatedData);

 }
}
