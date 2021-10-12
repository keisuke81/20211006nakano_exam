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

        return view('thanks');
    }
    
    public function find()
    {
        return view('find');
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        $keyword_fullname = $request->input('fullname');
        $keyword_gender  = $request->input('gender');
        $keyword_email   = $request->input('email');
        $keyword_from    = $request->input('from');
        $keyword_until    = $request->input('until');


        if(!empty($keyword_gender)){
            if (($keyword_gender)<=2){
                $query->where('gender', 'like', '%' . $keyword_gender . '%');
            }if(($keyword_gender)>=3){
            $query = Contact::where('gender','<=', $keyword_gender);}
        }
        if (!empty($keyword_fullname)) {
            $query = Contact::where('fullname', 'like', "%{$keyword_fullname}%");
        }
        if(!empty($keyword_email)){
            $query->where('email', 'like', '%' . $keyword_email . '%');
        }
        if (!empty($keyword_from) && !empty($keyword_until)) {
            $query = Contact::whereBetween('created_at', [$keyword_from, $keyword_until]);
    }

    $items = $query->get();
    return view('find', compact('items'));
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/find');
    }
}






