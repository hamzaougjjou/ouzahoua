<?php
namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\Store; // Import your Store model

class StoreController extends Controller
{


    public function getInfo()
    {
        // Find the store with id 1
        $store = Store::first();
        $shipping = Shipping::first();

        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Store information retrieved successfully',
            'store' => $store,
            'shipping' => $shipping,
        ]);
    }


    public function update(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'about' => 'nullable|string',
            'email' => 'required|email|max:255',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'logo' => 'nullable|image|max:2048', // Validate image for logo
            'icon' => 'nullable|image|max:2048', // Validate image for icon
        ]);
    
        // Find the store with id 1
        $store = Store::find(1);
    
        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found',
            ], 404);
        }
    
        // Handle file uploads for logo and icon
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public'); // Save in 'storage/app/public/logos'
            $validated['logo'] = $logoPath;
        }
    
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public'); // Save in 'storage/app/public/icons'
            $validated['icon'] = $iconPath;
        }
    
        // Update the store information
        $store->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Store information updated successfully',
            'store' => $store,
        ]);
    }
    
}
