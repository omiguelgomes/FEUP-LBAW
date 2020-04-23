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
        'pstate' => "Awaiting Payment",
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
      $newProduct = Product::create(
        [
          'model' => $request->inputName,
          'brand_id' => $request->inputBrand,
          'price' => $request->inputPrice,
          'stock' => $request->inputStock,
          'os_id' => $request->inputOS,
          'category' => $request->inputCat,
          'cpu_id' => $request->inputCPUname,
          'gpu_id' => $request->inputGPU,
          'ram_id' => $request->inputRAM,
          'screensize_id' => $request->inputScreen,
          'storage_id' => $request->inputStorage,
          'battery_id' => $request->inputBattery,
          'weight_id' => $request->inputWeight,
          'waterproofing_id' => $request->inputWater,
          'screenres_id' => $request->inputSreenRes,
          'camerares_id' => $request->inputCamRes,
          'fingerprinttype_id' => $request->inputFinger
        ]
        );
      
      //temp, while no image upload is done
      $newProduct->images->attach(1);

      return redirect('product/'.$newProduct->id);
    }
}
