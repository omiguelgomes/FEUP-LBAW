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
use App\Image;
use App\Brand;
use App\Product;

class AdminProfileController extends Controller
{
    public function show()
    {
      //should be changed with policies so only admins can come in
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      $products = Product::list();
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
      compact('user', 'products', 'cpu', 'ram', 'water', 'os', 'gpu', 'screen', 'weight', 'storage', 'battery', 'brands', 'screenRes', 'cams', 'fingers'));
    }

    public function destroyBrand($id)
    {
      $brand = Brand::find($id);
      $brand->delete();

      return $brand;
    }

    public function destroyCPU($id)
    {
      $cpu = CPU::find($id);
      $cpu->delete();

      return $cpu;
    }

    public function destroyRAM($id)
    {
      $ram = RAM::find($id);
      $ram->delete();

      return $ram;
    }

    public function destroyWater($id)
    {
      $water = WaterRes::find($id);
      $water->delete();

      return redirect()->to('admin');
    }

    public function destroyOS($id)
    {
      $os = OS::find($id);
      $os->delete();

      return redirect()->to('admin');
    }

    public function destroyGPU($id)
    {
      $gpu = GPU::find($id);
      $gpu->delete();

      return redirect()->to('admin');
    }

    public function destroyScreenSize($id)
    {
      $screen = ScreenSize::find($id);
      $screen->delete();

      return redirect()->to('admin');
    }

    public function destroyWeight($id)
    {
      $w = Weight::find($id);
      $w->delete();

      return redirect()->to('admin');
    }

    public function destroyStorage($id)
    {
      $st = Storage::find($id);
      $st->delete();

      return redirect()->to('admin');
    }

    public function destroyBattery($id)
    {
      $bat = Battery::find($id);
      $bat->delete();

      return redirect()->to('admin');
    }

    public function destroyScreenRes($id)
    {
      $screen = ScreenRes::find($id);
      $screen->delete();

      return redirect()->to('admin');
    }


    public function destroyCam($id)
    {
      $cam = CamRes::find($id);
      $cam->delete();

      return redirect()->to('admin');
    }

    public function destroyFinger($id)
    {
      $finger = FingerPrintType::find($id);
      $finger->delete();

      return redirect()->to('admin');
    }

    public function createBrand(Request $request)
    {
     
      $this->validate($request, array(
        'inputName' => 'required',
        'inputFile' => 'image|mimes:jpeg,png,jpg,JPG|max:2048',
      ));

      $brand = new Brand();
      $brand->name = $request->inputName;
      
      if($request->hasFile('inputFile')){
        $image = $request->file('inputFile');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);
        
        $img = new Image();
        $img->description = "$brand->name brand image";
        $img->path = $filename;
        $img->save();
        $brand->image_id = $img->id;
      };

      $brand->save();

      return redirect()->to('admin');
    }

    public function createCPU(Request $request)
    {
        $cpu = new CPU();
        $cpu->freq = $request->freq;
        $cpu->cores = $request->cores;
        $cpu->threads = $request->threads;
        $cpu->name = $request->name;
        $cpu->save();

        return $cpu;
    }

    public function createRAM(Request $request)
    {
        $ram = new RAM();
        $ram->value = $request->value;
        $ram->save();

        return $ram;
    }

    public function createWater(Request $request)
    {
        $water = new WaterRes();
        $water->value = $request->inputName;
        $water->save();

        return redirect()->to('admin');
    }

    public function createOS(Request $request)
    {
        $os = new OS();
        $os->name = $request->inputName;
        $os->save();

        return redirect()->to('admin');
    }

    public function createGPU(Request $request)
    {
        $gpu = new GPU();
        $gpu->name = $request->inputName;
        $gpu->vram = $request->inputVram;
        $gpu->save();

        return redirect()->to('admin');
    }

    public function createScreenSize(Request $request)
    {
        $ss = new ScreenSize();
        $ss->value = $request->inputName;
        $ss->save();

        return redirect()->to('admin');
    }

    public function createWeight(Request $request)
    {
        $item = new Weight();
        $item->value = $request->inputName;
        $item->save();

        return redirect()->to('admin');
    }

    public function createStorage(Request $request)
    {
        $item = new Storage();
        $item->value = $request->inputName;
        $item->save();

        return redirect()->to('admin');
    }

    public function createBattery(Request $request)
    {
        $item = new Battery();
        $item->value = $request->inputName;
        $item->save();

        return redirect()->to('admin');
    }

    public function createScreenRes(Request $request)
    {
        $item = new ScreenRes();
        $item->value = $request->inputName;
        $item->save();

        return redirect()->to('admin');
    }


    public function createCam(Request $request)
    {
        $item = new CamRes();
        $item->value = $request->inputName;
        $item->save();

        return redirect()->to('admin');
    }

    public function createFinger(Request $request)
    {
        $item = new FingerPrintType();
        $item->value = $request->inputName;
        $item->save();

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