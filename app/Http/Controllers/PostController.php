<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response\json;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $post = Post::all();
        $category = Category::all();
        return view("posts.index", compact("post","category")); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $post = Post::all();
        $category = Category::all();
        return view("posts.index", compact('category','post')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        try{
            // dd($request->all());
                // Validasi data
                $validatedData = $request->validate([
                    "creator" => 'required',
                    "category_id" => 'required',
                    "post_title" => 'required|unique:tb_post',
                    "post_content" => 'required',
                    "post_picture" => 'image',
                ], [
                    'required' => 'Column :attribute must filled.',
                    'unique' => 'Post is alreaady exist, choose another post title.',
                    'image' => 'File must be picture.',
                ]);
            
                // Simpan gambar baru dan dapatkan path-nya
                $validatedData['post_picture'] = $request->file('post_picture')->store('public/post-images');
            
                // Buat post baru
                Post::create($validatedData);
            
                // Redirect ke halaman index dengan membawa data post yang baru dibuat
                return redirect('/dashboard/post')->with('success', 'Post saved successfully!');

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
    public function show($slug)
    {
        $detail = Post::where('slug', $slug)->first();
        return view('posts.blog.show', [
        'detail' => $detail
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        $category = Category::all();
        return view("posts.edit", compact('category','post')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
    // Ambil data post berdasarkan slug
    $post = Post::where('slug', $slug)->first();

    // Tentukan aturan validasi
    $rules = [
        "creator" => 'required',
        "category_id" => 'required',
        "post_title" => 'required|unique:tb_post,post_title,'.$post->id,
        "post_content" => 'required',
        "post_picture" => 'image',
    ];

    if ($request->slug != $post->slug && $request->has('slug')) {
        $rules['slug'] = 'required|unique:tb_post,slug,'.$post->id;
    }

    // Validasi request
    $validatedData = $request->validate($rules);

    // Handle post_picture
    if ($request->file('post_picture')) {
        // Hapus gambar lama jika ada
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }

        // Simpan gambar baru
        $validatedData['post_picture'] = $request->file('post_picture')->store('public/post-images');
    } else {
        // Gunakan gambar lama jika tidak ada file baru yang diunggah
        $validatedData['post_picture'] = $post->post_picture;
    }

    // Update data post
    Post::where('id', $post->id)->update($validatedData);

    // Redirect atau response lainnya
    return redirect('/dashboard/post')->with('success', 'Post changed successfully!');


        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
        if($post->post_picture){
            Storage::delete($post->post_picture);
        }
        $post::destroy($post->id);
        return redirect('/dashboard/post')->with('success', 'Post has been deleted!'); 
        
    }

    public function autoSlug (Request $request)
    {
        try {
            $slug = SlugService::createSlug(Post::class, 'slug', $request->post_title);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


  
}
