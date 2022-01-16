<?php

namespace App\Http\Controllers;

use App\Models\ContactApp;
use Illuminate\Http\Request;

class ContactAppController extends Controller
{
    public function Contacts(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                "name" => "required",
                "email" => "required",
                "location" => "required",
                "designation" => "required",
                "phone" => "required",
                "image" => "required",
            ]);

            $contact = request()->all();
            $save_contact= ContactApp::create($contact);

            if ($save_contact) {
                return response()->json(["message" => "Contact  Address Saved Successfully", "data" => $contact]);
            }
        }
    }

    public function Update(Request $request, $id){
        if($request->isMethod('post')){
            $request->validate([
               
                "name" => "required",
                "email" => "required",
                "location" => "required",
                "designation" => "required",
                "phone" => "required",
                "image" => "required",
            ]);
            $saved = ContactApp::where(['id'=>$id])->update(['email'=>$request->email, 'name'=>$request->name, 'location'=>$request->location, 'designation'=>$request->designation, 'phone'=>$request->phone, 'image'=>$request->image]);
            if($saved){
                return response()->json(['msg'=>'Contact Updated Successfully', 'saved'=>$saved]);
            }
        }
    }

    public function fetchContacts()
    {
        $data = ContactApp::all();
        return response()->json($data);
    }
    public function SingleContacts($id)
    {
        $data = ContactApp::where("id" , $id)->first();
        return response()->json($data);
    }
    public function Delete($id)
    {
        $data = ContactApp::where("id" , $id)->delete();
        $data_contact = ContactApp::all();
        return response()->json(['msg'=>'Contact Updated', 'data'=>$data_contact, 'deleted'=>$data]);
    }

}
