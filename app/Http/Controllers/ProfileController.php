<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Country;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function show()
  {
    if (!Auth::check())
      return redirect('/register');
    else
      $user = Auth::user();

    return view('pages.profile')->with('user', $user);
  }

  public function profileUpdate(Request $request)
  {

    $data = $request->all();

    if ($data['password'] != null)
      $data['password'] = bcrypt($data['password']);
    else
      unset($data['password']);

    $user = Auth::user();
    $address = Address::find($data['addressID']);
    $city = City::where('name', '=', $data['city'])->first();
    $country = Country::where('name', $data['country'])->first();

    if ($country == null) {
      $country = Country::create([
        'name' => $data['country'],
      ]);
      $country->save();
    }

    if ($city == null) {
      $city = new City;
      $city->name = $data['city'];
      $city->country_id = $country->id;
      $city->save();
    }

    $address->city_id = $city->id;
    $address->country_id = $country->id;

    $address->street = $data['street'];
    $address->postal_code = $data['postalcode'];
    $address->save();

    return $this->show();
  }
}
