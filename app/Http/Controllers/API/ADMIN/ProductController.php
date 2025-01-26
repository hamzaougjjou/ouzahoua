<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Product;
// use App\Models\File;
use App\Models\ProductSubImage;
use Illuminate\Http\Request;
use App\Traits\FileTrait;
// use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    use FileTrait;
    // get and search for all product
    public function index(Request $request)
    {

        // / Retrieve a single parameter
        $sort = $request->input('sort'); //asc or desc
        $category = $request->input('category'); //category id
        $price = $request->input('price'); //asc or desc
        $q = $request->input('q'); //search text

        if (!$q)
            $q = "";

        // =====================================
        if ($sort) {
            $products = Product::
                where("name", "like", "%" . $q . "%")
                ->orderBy("created_at", $sort)
                ->paginate(9);
        } else if ($price) {
            $products = Product::
                where("name", "like", "%" . $q . "%")
                ->orderBy('price', $price)
                ->paginate(9);
        } else if ($category) {
            $products = Product::
                where("name", "like", "%" . $q . "%")
                ->where('category_id', $category)
                ->paginate(9);
        } else {
            $products = Product::
                where("name", "like", "%" . $q . "%")
                ->paginate(9);
        }


        // =====================================

        // $products = Product::paginate(10);
        // $page = 1;

        foreach ($products as $product) {
            $product->image = $this->getFilePath($product->image_id);
        }

        return response()->json([
            "success" => true,
            "message" => 'products retrieved successfully',
            "products" => $products
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the product data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'nullable',
            'body' => 'nullable|string',
            'discount_price' => 'nullable',
            'featured' => 'string',
            'category_id' => 'nullable|exists:categories,id',
            'thumbnail' => 'nullable|image', // Thumbnail validation
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sub_images.*' => 'image', // Validation for sub images
        ]);

        // Handle thumbnail upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('images/products', 'public');
        }


        $is_active = 1;
        if ($request->is_active == false || $request->is_active == 'false' || $request->is_active == 0) {
            $is_active = 0;
        }
        // Store the product
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'discount_price' => $validatedData['discount_price'] ?? null,
            'category_id' => $validatedData['category_id'] ?? null,
            'body' => $validatedData['body'],
            'is_active' => $is_active,
            'thumbnail' => $thumbnailPath,
            'meta_title' => $validatedData['meta_title'] ?? null,
            'meta_description' => $validatedData['meta_description'] ?? null,
            'meta_keywords' => $validatedData['meta_keywords'] ?? null,
            'featured' => $validatedData['featured'] ? ($validatedData['featured']==='true'? true: false) : false
        ]);

        // Store sub images
        $this->storeSubImages($request, $product->id);

        return response()->json([
            "success" => true,
            "message" => 'product created successfully',
            "product" => $product
        ], 200);

    }

    public function saveImage($request, $name, $saving_path = "images/products")
    {

        $file = $request->file($name);

        $origin_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();

        $image_path = $file->store($saving_path, 'public');

        // Create a new file record and get its ID
        return [
            "type" => "image/" . $extension,
            "size" => $size,
            "path" => $image_path,
            "origin_name" => $origin_name,
        ];
    }





    public function storeSubImages($request, $product_id): bool|null
    {
        if (!$request->hasFile('sub_images')) {
            return null;
        }

        foreach ($request->file('sub_images') as $image) {
            $imagePath = $image->store('sub_images', 'public'); // Save to public storage

            ProductSubImage::create([
                'product_id' => $product_id,
                'image_path' => $imagePath,
            ]);
        }

        return true;
    }


    public function productsBySerialId(Request $request, $product_type_id)
    {
        $q = $request->input('q'); //search text

        if (!$q)
            $q = "";

        $products = Product::
            where("name", "like", "%" . $q . "%")
            ->where("product_type_id", $product_type_id)
            ->latest()
            ->get();


        if ($product_type_id == 2 || $product_type_id == '2') {
            foreach ($products as $product) {
                # code...
                $product->items = $product->courseItems;
            }
        }

        return response()->json([
            "success" => true,
            "message" => 'products retrieved successfully',
            "products" => $products
        ], 200);
    }



    public function updateFileUrl(Request $request, $id)
    {
        // Validate that the input is a valid URL
        $request->validate([
            'file_url' => 'required|url',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the file_url field with the provided URL
        $product->file_url = $request->input('file_url');
        $product->save();

        return response()->json([
            'message' => 'Product file URL updated successfully!',
            'file_url' => $product->file_url,
        ], 200);
    }
    public function updateSerial(Request $request, $id)
    {
        // Validate that the input is a valid URL
        $request->validate([
            'serial_schema' => 'required',
        ]);
        // Find the product by ID
        $product = Product::findOrFail($id);
        // Update the file_url field with the provided URL
        $product->serial_schema = $request->input('serial_schema');
        $product->save();
        return response()->json([
            'message' => 'Product serial updated successfully!',
            'serial_schema' => $product->serial_schema,
        ], status: 200);
    }


}
