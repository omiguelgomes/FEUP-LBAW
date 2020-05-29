<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseState;
use App\Purchase;
use App\Image;
use App\Rating;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
  public function show($id)
  {
    $product = Product::findOrFail($id);

    if (!Auth::check()) {
      $canRate = false;
    } else {
      $canRate = Auth::user()->hasBought($product->id) && (!Auth::user()->hasReviewed($id));
    }
    return view('pages.product')->with(['product' => $product, 'canRate' => $canRate]);
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

    $newPurchase->products()->attach(
      $product->id,
      ['quantity' => 1]
    );

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
      'fingerprinttype_id' => $request->inputFinger,
      'description_id' => 1
    ]);

    if ($request->hasFile('inputImg')) {
      $allowedExtensions = ['jpg', 'JPG', 'png', 'jpeg'];

      $files = $request->file('inputImg');

      foreach ($files as $file) {
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        $img = new Image();
        $img->description = "$newProduct->model product image";
        $img->path = $filename;
        $img->save();
        $newProduct->images()->attach($img->id);
      }
    }

    return redirect('product/' . $newProduct->id);
  }

  public function update($id, Request $request)
  {

    Product::where('id', $id)->update((array('stock' => $request->stock)));
  }

  public function delete($id)
  {
    $product = Product::find($id);
    $product->delete();

    return $product;
  }

  public function addReview($id, Request $request)
  {
    if ($request->content == null) {
      // make this return error
      // return response()->json(['error' => 'Error msg'], 100);
    }
    $newRating = Rating::create([
      'user_id' => Auth::user()->id,
      'product_id' => $id,
      'content' => $request->content,
      'val' => $request->val
    ]);

    return json_encode([
      'user_image_path' => Auth::user()->image->path,
      'user_name' => Auth::user()->name,
      'product_id' => $id,
      'content' => $request->content,
      'val' => $request->val
    ]);
  }
}
