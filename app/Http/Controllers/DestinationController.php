<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\CategoryD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package= Destination::all();
        $categoryd = CategoryD::all();
        return view("destination.index", compact("package","categoryd")); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $package= Destination::all();
        $categoryd = CategoryD::all();
        return view("destination.index", compact("package","categoryd")); 
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
                    "package_name" => 'required|unique:tb_destination',
                    "categoryd_id" => 'required',
                    "package_price" => 'required',
                    "package_content" => 'required',
                    "package_picture" => 'image',
                ], [
                    'required' => 'Column :attribute must filled.',
                    'unique' => 'Package is alreaady exist, choose another package name.',
                    'image' => 'File must be picture.',
                ]);
            
                // Simpan gambar baru dan dapatkan path-nya
                $validatedData['package_picture'] = $request->file('package_picture')->store('public/package-images');
            
                // Buat post baru
                Destination::create($validatedData);
            
                // Redirect ke halaman index dengan membawa data post yang baru dibuat
                return redirect('/dashboard/destination')->with('success', 'Package saved successfully!');

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
    public function show(Destination $destination, $slug)
    {
        $detail = Destination::where('slug', $slug)->first();
        return view('destination.show', [
        'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $categoryd = CategoryD::all();
        return view("destination.index", compact('categoryd','destination')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $destination = Destination::where('slug', $slug)->first();

        // Tentukan aturan validasi
        $rules = [
            "package_name" => 'required|unique:tb_destination,package_name,'.$destination->id,
            "categoryd_id" => 'required',
            "package_price" => 'required',
            "package_content" => 'required',
            "package_picture" => 'image',
        ];
    
        if ($request->slug != $destination->slug && $request->has('slug')) {
            $rules['slug'] = 'required|unique:tb_destination,slug,'.$destination->id;
        }
    
        // Validasi request
        $validatedData = $request->validate($rules);
    
        // Handle post_picture
        if ($request->file('package_picture')) {
            // Hapus gambar lama jika ada
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
    
            // Simpan gambar baru
            $validatedData['package_picture'] = $request->file('package_picture')->store('public/package-images');
        } else {
            // Gunakan gambar lama jika tidak ada file baru yang diunggah
            $validatedData['package_picture'] = $destination->package_picture;
        }
    
        // Update data post
        Destination::where('id', $destination->id)->update($validatedData);
    
        // Redirect atau response lainnya
        return redirect('/dashboard/destination')->with('success', 'Package changed successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        if($destination->package_picture){
            Storage::delete($destination->package_picture);
        }
        $destination::destroy($destination->id);
        return redirect('/dashboard/destination')->with('success', 'Post has been deleted!'); 
    }

    public function autoSlug (Request $request)
    {
        try {
            $slug = SlugService::createSlug(CategoryD::class, 'slug', $request->package_name);
            return response()->json(['slug' => $slug]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function home (Destination $destination){
        $destcategory = CategoryD::all();
        return view('destination.index', compact('destination', 'destcategory'));
    }
}
