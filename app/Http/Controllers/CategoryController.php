<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $categories = Category::
        where( 'level', 'parent' )
        ->orWhere( 'level', null )
        ->paginate( 10 );
        dd( $categories );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

   
    public function show($slug)
    {
        //
        $category = Category::where( "slug" , $slug )->first();
        if( !$category ){
            abort( 404 );
        }

        $parent_category = null;
        if($category->parent_id ){
            $parent_category = Category::find($category->parent_id);
        }

        $children_categories = Category::where( "parent_id" , $category->id )->get();

        $products = Product::where("category_id" , $category->id)
        ->orWhere("category_id" , $category->parent_id)
        ->get();

        return view("category_item")
        ->with(compact("category" , "parent_category" , "children_categories" , "products") );

    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Category $category ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, Category $category ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Category $category ) {
        //
    }
}
