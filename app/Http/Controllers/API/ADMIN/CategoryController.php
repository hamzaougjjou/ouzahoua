<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileTrait;
use App\Models\File;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use FileTrait, SlugTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::all();
        foreach ($categories as $category) {
            $category->image = $this->getFilePath($category->image_id);
            $category->items_count = Product::where('category_id', $category->id)->count();
        }

        return response()->json([
            "success" => true,
            "message" => 'categories retrieved successfully',
            "categories" => $categories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_path = null;
        // Handle image upload and store the file path in the files table
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_path = $file->store('images/categories', 'public');
        }

        $level = 'parent';
        $parent_id = null;

        if ($request->parent_category) {
            $parent_category = Category::find($request->parent_category);
            if ($parent_category) {
                $level = 'child';
                $parent_id = $parent_category->id;
            }
        }

        // Create a new category using the validated data
        $category = Category::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image_path' => $image_path,
            'level' => $level,
            'parent_id' => $parent_id,
            'slug' => $this->createSlug($validated['title'])
        ]);

        if (!$category) {
            return response()->json([
                "success" => false,
                "error" => 'internal server error'
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => 'category created successfully',
            "category" => $category
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                "success" => false,
                "error" => 'category with id nout found'
            ], 404);
        }

        $category->image = $this->getFilePath($category->image_id);

        return response()->json([
            "success" => true,
            "category" => $category,
            "message" => 'category re successfully'
        ], 200);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                "success" => false,
                "error" => 'category with id nout found'
            ], 404);
        }

        // return response()->json([
        //     "success" => false,
        //     "error" => $request->name
        // ], 200);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]
        );

        if ($validator->fails()) {
            return ResponseResource::error('invalid data sent', 422, $request->all());
        }

        // Handle image upload and store the file path in the files table
        if ($request->hasFile('image')) {


            $file = $request->file('image');

            $origin_name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            // $images[] = $name;

            $image_path = $file->store('images/categories', 'public');
            // Create a new file record and get its ID
            $file_db = File::create([
                "type" => "image/" . $extension,
                "size" => $size,
                "path" => $image_path,
                "origin_name" => $origin_name,
            ]);

            $imageId = $file_db->id;
        }

        // update category using the validated data and the image ID
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image_id = $imageId ?? $category->image_id;

        $category->save();

        if (!$category) {
            return response()->json([
                "success" => false,
                "error" => 'internal server error'
            ], 500);
        }

        return response()->json([
            "success" => $request->name,
            "message" => 'category created successfully',
            "category" => $category
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                "success" => false,
                "error" => 'category with id nout found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            "success" => true,
            "message" => 'category deleted successfully'
        ], 200);
    }

    public function parentsCategories()
    {

        $categories = Category::where("parent_id", null)->get();

        foreach ($categories as $category) {
            // $category->image = $this->getFilePath($category->image_id);
            $category->sub_categories_count = Category::where('parent_id', $category->id)->count();
        }

        return response()->json([
            "success" => true,
            "message" => 'categories retrieved successfully',
            "categories" => $categories
        ], 200);
    }

    public function getSubCategories($parent_id)
    {

        $categories = Category::where('parent_id', $parent_id)->get();

        return response()->json([
            "success" => true,
            "message" => 'categories retrieved successfully',
            "categories" => $categories
        ], 200);
    }

}



