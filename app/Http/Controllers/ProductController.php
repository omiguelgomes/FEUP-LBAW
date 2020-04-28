<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseState;
use App\Purchase;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
      $product = Product::findOrFail($id);
      return view('pages.product')->with('product', $product);
    }

    public function buy($id)
    {
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      $product = Product::find($id);

      $newPs = PurchaseState::create([
        'statechangedate' => date("Y-m-d"),
        'comment' => "Please Pay!",
        'pstate' => "Processing",
      ]);

      $newPurchase = Purchase::create([
        'val' => $product->price, 
        'status_id' => $newPs->id,
        'paid' => 1,
        'user_id' => $user->id,
        'purchasedate' => date("Y-m-d")
      ]);

      $newPurchase->products()->attach($product->id, 
      ['quantity' => 1]);

      return redirect('purchase_history');
    }

    public function create(Request $request)
    {
      
      $newProduct = Product::create([
      'stock' => $request->inputStock,
      'price' => $request->inputPrice,
      'model' => $request->input('inputName'),
      'category' => $request->inputCat,
      'brand_id' => $request->inputBrand,
      'cpu_id' => $request->inputCPUname,
      'ram_id' => $request->inputRAM,
      'waterproofing_id' => $request->inputWater,
      'os_id' => $request->inputOS,
      'gpu_id' => $request->inputGPU,
      'screensize_id' => $request->inputScreen,
      'weight_id' => $request->inputWeight,
      'storage_id' => $request->inputStorage,
      'battery_id' => $request->inputBattery,
      'screenres_id' => $request->inputSreenRes,
      'camerares_id' => $request->inputCamRes,
      'fingerprinttype_id' => $request->inputFinger]);

      //temp, while no image upload is done
      $newProduct->images()->attach(1);
      
      return redirect('product/'.$newProduct->id);
    }
}