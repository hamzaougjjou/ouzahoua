<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseItem;
use App\Models\Product;

class CourseItemController extends Controller
{

    /**
     * Display a listing of course items by course_id.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        // Get all course items by the given product (course) ID
        $courseItems = CourseItem::where('product_id', $product_id)->get();

        // Return the course items
        return response()->json([
            "success" => true,
            "message" => 'course items retrieved successfully',
            "course_items" => $courseItems
        ], 200);
    }

    /**
     * Store a newly created course item in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $product_id)
    {
        // Validate the incoming request
        $request->validate([
            'video_url' => 'required|url',
            'title' => 'required|string|max:255',
            'description' => 'string',
        ]);

        // Find the course by ID
        $course = Product::findOrFail($product_id);

        // Create the course item
        $course_item = CourseItem::create([
            'video_url' => $request->video_url,
            'title' => $request->title,
            'product_id' => $course->id,
            'description' => $request->description,
        ]);

        // Return a success response
        return response()->json([
            "success" => true,
            "message" => 'Course item added successfully',
            "course_item" => $course_item
        ], 200);
    }



    /**
     * Remove the specified course item from the database.
     *
     * @param  int  $courseId
     * @param  int  $itemId
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseId, $itemId)
    {
        // Find the course item by its ID
        $courseItem = CourseItem::where('course_id', $courseId)->findOrFail($itemId);

        // Delete the course item
        $courseItem->delete();

        // Return a success response
        return response()->json(['message' => 'Course item deleted successfully'], 200);
    }

}
