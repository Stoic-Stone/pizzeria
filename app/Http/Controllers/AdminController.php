<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Order;

use App\Models\Supplier;

use App\Models\Ingredient;

class AdminController extends Controller
{
    public function users(){
        $data = User::all();
        return view("admin.users", compact("data"));
    }

   
    public function deleteuser($id){
        $data = User::find($id);
        $data->delete(); 
        return redirect()->back(); 
    }

    public function deletemenu($id){
        $data=food::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateRole(Request $request, $id)
    {
        
        $request->validate([
            'usertype' => 'required|in:0,2,3', 
        ]);

        
        $user = User::find($id);

        
        if ($user) {
            $user->usertype = $request->usertype;
            $user->save();
        }

        return redirect()->back()->with('success', 'User role updated successfully.');
    }

    public function foodmenu(){
        $data=food::all();
        return view("admin.foodmenu",compact("data"));
    }

    public function upload(Request $request){
        
       $data = new food;

       $image=$request->image;
       $imagename=time(). '.' .$image->getClientOriginalExtension();
                 $request->image->move('foodimage',$imagename);
                 $data->image=$imagename;
                 $data->title=$request->title;
                 $data->price=$request->price;
                 $data->description=$request->description;
                 $data->save();
                 return redirect()->back();
    }

    public function orders(){
        $data=order::all();
        return view('admin.orders',compact('data'));
    }

    public function search(Request $request){
        $search=$request->search;
        $data=order::where('name','Like','%'.$search.'%')->orwhere('foodname','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));
    }

    public function suppliers() {
        $suppliers = Supplier::with('ingredients')->get(); // Get suppliers with their ingredients
        return view('admin.suppliers', compact('suppliers'));
    }
    
    public function uploadSuppliers(Request $request) {
        // Validate the supplier and supply input
        $request->validate([
            'name' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:suppliers,email',
            'address' => 'required',
            'supplies' => 'required|array',
            'supplies.*.name' => 'required',
            'supplies.*.description' => 'required',
            'supplies.*.price' => 'required|numeric',
        ]);
    
        // Save supplier
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact_name = $request->contact_name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->save();
    
        // Save supplies (ingredients) linked to the supplier
        foreach ($request->supplies as $supply) {
            $ingredient = new Ingredient();
            $ingredient->name = $supply['name'];
            $ingredient->description = $supply['description'];
            $ingredient->price = $supply['price'];
            $ingredient->supplier_id = $supplier->id; // Link ingredient to supplier
            $ingredient->save();
        }
    
        return redirect()->back()->with('success', 'Supplier and supplies added successfully.');
    }
}
