<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $inputs = $request->all();

        return view('/confirm',[
            'inputs' => $inputs,
        ]);


    }

    public function send(Request $request)
    {
        if($request->get('back')){
            return redirect('/')->withInput();
        }
        return('thanks');
    }

}
