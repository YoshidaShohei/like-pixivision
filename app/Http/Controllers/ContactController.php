<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendMail;

class ContactController extends Controller
{
    public function index() {
        return view('contact.contact');
    }
    
    public function confirm(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
            
        ]);
            
        $inputs = $request->all();
        
        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }    
    
    public function thanks(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required',
            'body' => 'required'
            
        ]);
            
        $action = $request->input('action');
        
        $inputs = $request->except('action');
        
        if($action !== 'submit') {
            return redirect()
            ->route('contact.index')
            ->withInput($inputs);
        } else {
            \Mail::to($inputs['email'])->send(new ContactSendMail($inputs));
            
            $request->session()->regenerateToken();
            
            return view('contact.thanks');

        }
    }}
