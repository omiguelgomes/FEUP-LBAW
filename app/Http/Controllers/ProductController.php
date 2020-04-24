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
      /*
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
        */

      $model = $request->input('inputName');
      $brand = $request->inputBrand;
      $price = $request->inputPrice;
      $stock = $request->inputStock;
      $os = $request->inputOS;
      $cat = $request->inputCat;
      $cpu = $request->inputCPUname;
      $gpu = $request->inputGPU;
      $ram = $request->inputRAM;
      $size = $request->inputScreen;
      $storage = $request->inputStorage;
      $battery = $request->inputBattery;
      $weight = $request->inputWeight;
      $water = $request->inputWater;
      $res = $request->inputSreenRes;
      $camRes = $request->inputCamRes;
      $finger = $request->inputFinger;
  

      $product = new Product();
      $product->stock = $stock;
      $product->price = $price;
      $product->model = $model;
      $product->category = $cat;
      $product->brand_id = $brand;
      $product->cpu_id = $cpu;
      $product->ram_id = $ram;
      $product->waterproofing_id = $water;
      $product->os_id = $os;
      $product->gpu_id = $gpu;
      $product->screensize_id = $size;
      $product->weight_id = $weight;
      $product->storage_id = $storage;
      $product->battery_id = $battery;
      $product->screenres_id = $res;
      $product->camerares_id = $camRes;
      $product->fingerprinttype_id = $finger;
      $product->save();

      
      //temp, while no image upload is done
      DB::insert('insert into image_product (product_id, image_id) values (:pid, :iid);',
      ['pid' => $product->id, 'iid' => 1]);


      return redirect('product/'.$product->id);
    }
}
