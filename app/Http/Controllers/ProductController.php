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
      //temporary so it doesn't break while auth is incomplete
      if (!Auth::check()) 
          $user = User::find(1);
      else
          $user = Auth::user();

      $product = Product::find($id);

      $newPs = new PurchaseState();
      $newPs->statechangedate = date("Y-m-d");
      $newPs->comment = "Please Pay!";
      $newPs->pstate = "Awaiting Payment";
      $newPs->save();

      $newPurchase = new Purchase();
      $newPurchase->val = $product->price;
      $newPurchase->statusid = $newPs->id;
      //hard-coded payed by card
      $newPurchase->paid = 1;
      $newPurchase->userid = $user->id;
      $newPurchase->purchasedate = date("Y-m-d");
      $newPurchase->save();

      DB::insert('insert into product_purchase (productid, purchaseid, quantity) values (:pid, :puid, 1)',
      ['pid' => $product->id, 'puid' => $newPurchase->id]);

      return redirect('purchase_history');
    }

    public function create(Request $request)
    {
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
      $product->brandid = $brand;
      $product->cpuid = $cpu;
      $product->ramid = $ram;
      $product->waterproofingid = $water;
      $product->osid = $os;
      $product->gpuid = $gpu;
      $product->screensizeid = $size;
      $product->weightid = $weight;
      $product->storageid = $storage;
      $product->batteryid = $battery;
      $product->screenresid = $res;
      $product->cameraresid = $camRes;
      $product->fingerprinttypeid = $finger;
      $product->save();
      
      DB::insert('insert into image_product (productID, imageID) values (:pid, :iid);',
      ['pid' => $product->id, 'iid' => 1]);

      return redirect('product/'.$product->id);
    }
}
