<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

use App\Models\Order;




class HomeController extends Controller
{
    public function index(){
        $data=food::all();
        $count=0;
        if(Auth::check()){
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
        }
        return view("home",compact('data','count'));
    }

    public function redirects(){
        $usertype=Auth::user()->usertype;
        $data=food::all();
        if($usertype=='1'){
            return view('admin.adminhome');
        }else{

            $user_id=Auth::id();

            $count=cart::where('user_id',$user_id)->count();

            return view('home',compact('data','count'));
        }
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){
            $user_id=Auth::id();

            $foodid=$id;

            $quantity=$request->quantity;

            $cart=new cart;

            $cart->user_id=$user_id;

            $cart->food_id=$foodid;

            $cart->quantity=$quantity;

            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    public function showcart(Request $request,$id){
        $count=cart::where('user_id',$id)->count();

        $data2=cart::select('*')->where('user_id', '=' ,$id)->get();

        $data=cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
        return view('showcart',compact('count','data','data2'));
    }

    public function remove($id){

        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $request){
       foreach($request->foodname as $key =>$foodname ){
        $data=new order;
        $data->foodname=$foodname;
        $data->price=$request->price[$key];
        $data->quantity=$request->quantity[$key];
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();
       }
       return redirect()->back();
    }

    

}
