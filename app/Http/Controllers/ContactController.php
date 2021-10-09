<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Rules\ZipCodeRule;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();
        $inputs = $request->all();

        return view('/confirm', [
            'inputs' => $inputs,
        ])->with($validated);
    }

    public function send(Request $request)
    {
        if($request->get('back')){
            return redirect('/')->withInput();
        }
        return view('thanks');
    }

}
