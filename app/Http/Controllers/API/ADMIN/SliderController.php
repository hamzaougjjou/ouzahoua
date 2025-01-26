<?php
namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Enums\SliderLocation;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return response()->json($sliders);
    }

    /**
     * Store a newly created slider.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'background' => 'required|string|max:255',
            'background_sm' => 'nullable|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:255',
            // 'location' => 'required|in:' . implode(',', SliderLocation::values()),
        ]);

        $slider = Slider::create($validatedData);

        return response()->json([
            'message' => 'Slider created successfully',
            'slider' => $slider,
        ], 201);
    }

    /**
     * Update the specified slider.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'background' => 'sometimes|string|max:255',
            'background_sm' => 'sometimes|string|max:255',
            'title' => 'sometimes|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:255',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:255',
            // 'location' => 'sometimes|in:' . implode(',', SliderLocation::values()),
        ]);

        $slider = Slider::findOrFail($id);
        $slider->update($validatedData);

        return response()->json([
            'message' => 'Slider updated successfully',
            'slider' => $slider,
        ]);
    }

    /**
     * Remove the specified slider.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return response()->json(['message' => 'Slider deleted successfully']);
    }
}
