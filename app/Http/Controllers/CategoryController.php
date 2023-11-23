<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view("posts.categoryp.index", compact("category")); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.categoryp.create"); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Category::create($request->all());
        // return redirect()->route('posts.category.index'); 
        try{
                $validatedData = $request->validate([
                    "category_name" => 'required|unique:tb_category',
                ], [
                    'required' => 'Column :attribute must filled.',
                    'unique' => 'Category is already exist, choose another category.',
                ]);
            
            
                
                Category::create($validatedData);
            
                // Redirect ke halaman index dengan membawa data post yang baru dibuat
                return redirect('/dashboard/postcategory')->with('success', 'Category saved successfully!');

            } catch (\Illuminate\Validation\ValidationException $e) {
                // Tangkap exception dan tampilkan notifikasi error
                return redirect()->back()
                    ->withInput()
                    ->withErrors($e->errors());
            } catch (\Exception $e) {
                // Tangkap exception dan tampilkan notifikasi error
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error', 'Error. ' . $e->getMessage()]);
                   
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("posts.categoryp.edit", compact("category")); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $postcategory)
    {
  
        

        $rules = [
            "category_name" => 'required|unique:tb_category',
        ];

        if ($request->slug != $postcategory->slug && $request->has('slug')) {
            $rules['slug'] = 'required|unique:tb_category,slug,'.$postcategory->id;
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $postcategory->id)->update($validatedData);
        return redirect('/dashboard/postcategory')->with('success', 'Category changed successfully!');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $postcategory)
    {   
        $postcategory::destroy($postcategory->id);
        return redirect('/dashboard/postcategory')->with('success', 'Category has been deleted!'); 
    }

    public function autoSlug (Request $request)
    {
        try {
            $slug = SlugService::createSlug(Category::class, 'slug', $request->category_name);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
