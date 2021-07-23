<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
  //  Validate data
  // ddd($request->all());
  $validatedData = $request->validate([
    "full_name" => "required",
    "email" => "required | email",
    "message" =>"required",
  ]);
  // ddd($validatedData);
  // send email
  // only display without sending
  // return (new ContactFormMail($validatedData))->render();
  Mail::to('admin@test.com')->send(new ContactFormMail($validatedData));
  return redirect()
  ->back()
  ->with('message', 'Success! Thanks for  your email, we will answer you in 48hours');
 }
}
