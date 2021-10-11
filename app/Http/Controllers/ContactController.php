<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Rules\ZipCodeRule;
use Illuminate\Support\Facades\DB;

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

    public function create(ContactRequest $request)
    {
        if ($request->get('back')) {
            return redirect('/')->withInput();
        }


        $param=[
            'fullname'=>$request->fullname,
            'gender'=>$request->gender,
            'email' =>$request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];

        Contact::create($request->all());


    }
}
