<?php

namespace App\Http\Controllers;

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
      return view('pages.adminProfile');
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
