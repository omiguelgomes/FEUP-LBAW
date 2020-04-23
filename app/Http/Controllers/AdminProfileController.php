<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

class AdminProfileController extends Controller
{
    public function show()
    {
      //should be changed with policies so only admins can come in
      if (!Auth::check()) 
        return redirect('/register');
      else
          $user = Auth::user();

      return view('pages.adminProfile')->with('user', $user);
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
