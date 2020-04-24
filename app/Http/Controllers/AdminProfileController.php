<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Specs\CPU;
use App\Specs\RAM;
use App\Specs\WaterRes;
use App\Specs\OS;
use App\Specs\GPU;
use App\Specs\ScreenSize;
use App\Specs\Weight;
use App\Specs\Storage;
use App\Specs\Battery;
use App\Specs\ScreenRes;
use App\Specs\CamRes;
use App\Specs\FingerPrintType;
use App\Specs\Image;
use App\Brand;

class AdminProfileController extends Controller
{
    public function show()
    {
      //should be changed with policies so only admins can come in
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      
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

      return view('pages.adminProfile', 
      compact('user', 'cpu', 'ram', 'water', 'os', 'gpu', 'screen', 'weight', 'storage', 'battery', 'brands', 'screenRes', 'cams', 'fingers'));
    }

    public function destroyBrand($id)
    {
      $brand = Brand::find($id);
      $brand->delete();

      return redirect()->to('admin');
    }

    public function destroyCPU($id)
    {
      $cpu = CPU::find($id);
      $cpu->delete();

      return redirect()->to('admin');
    }

    public function destroyRAM($id)
    {
      $ram = RAM::find($id);
      $ram->delete();

      return redirect()->to('admin');
    }

    public function destroyWater($id)
    {
      $water = WaterRes::find($id);
      $water->delete();

      return redirect()->to('admin');
    }

    public function createBrand(Request $request)
    {
     
      $this->validate($request, array(
        'inputName' => 'required',
        'inputFile' => 'image|mimes:jpeg,png,jpg|max:2048',
      ));

      $brand = new Brand();
      $brand->name = $request->inputName;
      
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

      return redirect()->to('admin');
    }

    public function createCPU(Request $request)
    {
        $cpu = new CPU();
        $cpu->freq = $request->inputFreq;
        $cpu->cores = $request->inputCores;
        $cpu->threads = $request->inputThreads;
        $cpu->name = $request->inputName;
        $cpu->save();

        return redirect()->to('admin');
    }

    public function createRAM(Request $request)
    {
        $ram = new RAM();
        $ram->value = $request->inputName;
        $ram->save();

        return redirect()->to('admin');
    }

    public function createWater(Request $request)
    {
        $water = new WaterRes();
        $water->value = $request->inputName;
        $water->save();

        return redirect()->to('admin');
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
