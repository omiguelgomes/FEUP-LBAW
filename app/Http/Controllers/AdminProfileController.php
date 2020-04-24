<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\CPU;
use App\RAM;
use App\WaterRes;
use App\OS;
use App\GPU;
use App\ScreenSize;
use App\Weight;
use App\Storage;
use App\Battery;
use App\Brand;
use App\ScreenRes;
use App\CamRes;
use App\FingerPrintType;
use App\Image;

class AdminProfileController extends Controller
{
    public function show()
    {
      //should be changed with policies so only admins can come in
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      
      $brands = Brand::list();

      return view('pages.adminProfile', compact('user', 'brands'));
    }

    public function destroyBrand($id)
    {
      $brand = Brand::findOrFail($id);
      $brand->delete();

      return redirect()->to('admin'.'/#brands');
    }

    public function createBrand(Request $request)
    {
     
      $this->validate($request, array(
        'inputName' => 'required',
        'inputFile' => 'image|mimes:jpeg,png,jpg|max:2048',
      ));

      $name = $request->inputName;
      $brand = new Brand();
      $brand->name = $name;
      
      if($request->hasFile('inputFile')){
        $image = $request->file('inputFile');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);
        
        $img = new Image();
        $img->description = "$name brand image";
        $img->path = '/public/images' . $filename;
        $img->save();
        $brand->image_id = $img->id;
      };

      $brand->save();

      return redirect()->to('admin'.'/#brands');
    }

    public function showProductCreateForm()
    {
      $cpu = CPU::list();
      $ram = RAM::list();
      $water = WaterRes::list();
      $os = OS::list();
      $gpu = GPU::list();
      $screen = ScreenSize::list();
      $weight = Weight::list();
      $storage = Storage::list();
      $battery = Battery::list();
      $brands = Brand::list();
      $screenRes = ScreenRes::list();
      $cams = CamRes::list();
      $fingers = FingerPrintType::list();


      return view('pages.addProduct', 
      compact('cpu', 'ram', 'water', 'os', 'gpu', 'screen', 'weight', 'storage', 'battery', 'brands', 'screenRes', 'cams', 'fingers'));
    }
}
