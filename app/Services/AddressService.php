<?php

namespace App\Services;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressService
{
    public function storeOrUpdateAddress(Request $request, $id = null)
    {
  
        $validated = $this->validateRequest($request, $id);

        
        if ($id) {
            $address = UserAddress::findOrFail($id);
        } else {
            $address = new UserAddress();
            $address->user_id = Auth::id();
        }

       
        $address->name = $validated['name'];
        $address->email = $validated['email'];
        $address->phone = $validated['phone'];
        $address->country = $validated['country'];
        $address->state = $validated['state'];
        $address->city = $validated['city'];
        $address->zip = $validated['zip'];
        $address->address = $validated['address'];

        
        return $address->save();
    }

    private function validateRequest(Request $request, $id = null)
    {
      
        $emailRule = $id ? 'required|email|unique:users,email,' . $id : 'required|email|unique:users,email';

        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => $emailRule,
            'phone' => 'required|numeric|digits_between:10,15',
            'country' => 'required|exists:countries,name',
            'state' => 'required|exists:states,name',
            'city' => 'required|exists:cities,name',
            'zip' => 'required|numeric|digits:6',
            'address' => 'required|string',
        ]);
    }
}
