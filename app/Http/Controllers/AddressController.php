<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{State, City, Country, UserAddress};
use App\DataTables\{UserAddressesDataTable};
use App\Services\AddressService;

class AddressController extends Controller
{
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }

    public function addAddress(){
        $countries = Country::all();
        return view('user.address',compact('countries'));
    }

    public function storeAddress(Request $request, AddressService $addressService)
    {
      
        $success = $addressService->storeOrUpdateAddress($request, null);

        if ($success) {
            return redirect()->route('user.checkout')->with('success', 'Profile Address Updated Successfully!');
        } else {
            return redirect()->route('user.checkout')->with('danger', 'Failed to update. Please try again.');
        }
    }

    public function address(UserAddressesDataTable $dataTable){
      
        return $dataTable->render('user.address.list');
    }

    public function addressEdit($id)
    {
        $type = 2; // For editing
        $address = UserAddress::with(['country_details:id,name', 'state_details:id,name',  'city_details:id,name'])->findOrFail($id);
    
        $countries = Country::all();
        $states = State::where('country_id', $address->country_details->id)->get(); 
        $cities = City::where('state_id', $address->state_details->id)->get(); 
        return view('user.address.add', compact('type', 'address', 'countries', 'states', 'cities'));
    }

    public function addressDelete($id)
    {
        UserAddress::destroy($id);
        session()->flash('alert', 'success');
        session()->flash('message', 'Deleted Successfully!');
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        
    }

    public function addressAdd(){
        $countries = Country::all();
        $type = 1; //for add
        return view('user.address.add',compact('type','countries'));
    }

    public function addressStore(Request $request, AddressService $addressService){
        // return $request;
        $success = $addressService->storeOrUpdateAddress($request, null);

        if ($success) {  
            return redirect()->route('user.address')->with(['alert' => 'success', 'message' => 'Profile Address Added Successfully!']);
        } else {
            return back()->with('danger', 'Failed to update. Please try again.');
        }
    }

    public function addressUpdate(Request $request, AddressService $addressService, $id){
        // return $request;
        $success = $addressService->storeOrUpdateAddress($request, $id);

        if ($success) {  
            return redirect()->route('user.address')->with(['alert' => 'success', 'message' => 'Profile Address Updated Successfully!']);
        } else {
            return back()->with('danger', 'Failed to update. Please try again.');
        }
    }
}
