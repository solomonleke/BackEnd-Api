<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class MainController extends Controller
{
    //
    public function Register(Request $request){
        if($request->isMethod('POST')){
            $request->validate([
                'email'=>'required',
                'password'=>'required',
            ]);
            $data = $request->all();
            $data['password']= Hash::make($request->password);
            $saved = User::create($data);
            if ($saved){
                $token = JWTAuth::fromUser($saved);
                return response()->json(['msg'=>'Registered Successfully', "data"=>$saved, 'token'=>$token]);
            }
    }
    dd('working');
}

    public function Login(Request $request){
        if($request->isMethod('POST')){

            $email = $request->email;
            $password=$request->password;
            
            if (Auth::attempt(['email'=> $email, 'password'=>$password])){
                $user= User::where(['email'=>$email])->first();
                $token = JWTAuth::fromUser($user);
                // $token= $this->createNewToken($token);
                return response()->json(['msg'=>'login', 'token'=>$token, 'user'=>$user]);
            }
    }
    }

    public function Products($id=null){
        if ($id){
            $products=Product::where(['id'=>$id])->first();
            return response()->json(['msg'=>'product', 'products'=>$products]);
        }
        $products=Product::with('favourites')->get();
        return response()->json(['msg'=>'product', 'products'=>$products]);
    }

    public function PaginatedProducts($id){
      
            $products=Product::paginate($id);

            return response()->json($products);
       
    }


    public function Favourite(Request $request){
        
        if($request->isMethod('post')){
            
            $request->validate([
                'user_id'=>'required',
                'product_id'=>'required',
                'favourite'=>'required',
            ]);

            // return response()->json(['msg'=>$request->all()]);
            $check = Favourite::where(['user_id'=>$request->user_id, 'product_id'=>$request->product_id])->first();
            if($check){
                Favourite::where(['user_id'=>$request->user_id, 'product_id'=>$request->product_id])->update(['favourite'=>$request->favourite]);
                $saved = Favourite::where(['user_id'=>$request->user_id, 'product_id'=>$request->product_id])->get();
                return response()->json(['msg'=>'favourite_updated', 'saved'=>$saved]);
            }else{
                $saved = Favourite::create($request->all());
                return response()->json(['mesg'=>'favourite_saved', 'saved'=>$saved]);
            }
           
           
        }

    
    }

    public function Update(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'user_id'=>'required',
                'email'=>'required',
                'lastname'=>'required',
                'address'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postalcode'=>'required'
            ]);
            $saved = Contact::where(['user_id'=>$request->user_id])->update(['email'=>$request->email, 'firstname'=>$request->firstname, 'lastname'=>$request->lastname, 'address'=>$request->address, 'city'=>$request->city, 'apartment'=>$request->apartment, 'country'=>$request->country, 'postalcode'=>$request->postalcode]);
            if($saved){
                return response()->json(['msg'=>'Contact Updated', 'saved'=>$saved]);
            }
        }
    }
    public function Contact(Request $request, $id=null){
        if($request->isMethod('post')){
            $request->validate([
                'user_id'=>'required',
                'email'=>'required',
                'lastname'=>'required',
                'address'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postalcode'=>'required'
            ]);
            $saved = Contact::create($request->all());
            if($saved){
                return response()->json(['msg'=>'Contact Saved', 'saved'=>$saved]);
            }
            
        }
        // return response()->json(['msg'=>'Contact Available', 'contact_id'=>$id]);
        $contacts = Contact::where(['user_id'=>$id])->get();
        if($contacts){
            return response()->json(['msg'=>'Contact Available', 'contact'=>$contacts]);
        }
    }

    // This is a view to add products to the database by the admin
    public function Product_save(Request $request){
        if($request->isMethod('post')){
           $request->validate([
               'Name'=>'required',
               'Description'=>'required',
               'Color'=>'required',
               'Price'=>'required',
               'Size'=>'required',
               'SlicedPercentage'=>'required',
               'AdditionalInfo'=>'required',
               'Picture_url1'=>'required'

           ]);

        $data = $request->all();

        $name1 = $request->file('Picture_url1')->getClientOriginalName();
        $file1 = $request->file('Picture_url1');
        $name2 = $request->file('Picture_url2')->getClientOriginalName();
        $file2 = $request->file('Picture_url2');
        $name3 = $request->file('Picture_url3')->getClientOriginalName();
        $file3 = $request->file('Picture_url3');
        $name4 = $request->file('Picture_url4')->getClientOriginalName();
        $file4 = $request->file('Picture_url4');
        $destination = 'images';
        $file1->move($destination,$file1->getClientOriginalName());
        $data['Picture_url1']= $name1;
        $file2->move($destination,$file2->getClientOriginalName());
        $data['Picture_url2']= $name2;
        $file3->move($destination,$file3->getClientOriginalName());
        $data['Picture_url3']= $name3;
        $file4->move($destination,$file4->getClientOriginalName());
        $data['Picture_url4']= $name4;

        $saved = Product::create($data);
    }
    $data = Category::all();
    $brands = Brand::all();
        return view('product', compact("data", "brands"));
    }
    
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }

    public function addbrand(Request $request)
    {
        if($request->isMethod("post")){
            $save = Brand::Create($request->all());
            // dd($save);
        }
        $data = Category::all();
       return view("addbrand", compact("data"));
    }
    public function category(Request $request)
    {
       
        $data = Category::all();

       return response()->json($data);
    }
    public function brand($id)
    {
       
        $data = Brand::where(["category_id" => $id])->get();

       return response()->json($data);
    }

    public function categoryCheck($category)
    {
       
        $data = Product::where(["Categories_id" => $category])->get();

        

       return response()->json($data);
    }


    public function Payment(Request $request)
    {
       if($request->isMethod("POST")){
        $data = Payment::Create($request->all()); 
        
        if($data){
            return response()->json(['msg'=>'Order saved', 'saved'=>$data]);
        }
       }
        
    }
    public function PaymentConfirm($ref)
    {
       $update = Payment::where("trans_ref", $ref)->update(["trans_status" => "Successful"]);

       return response()->json(['msg'=>'Order confirmed', 'saved'=>$update]);


        
    }
   
}