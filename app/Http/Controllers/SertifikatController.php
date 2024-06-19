<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import Model
use App\Models\Sertifikat;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//return type View
use Illuminate\View\View;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{

    public function index(): View 
    {
        $sertifikat = Sertifikat::paginate(10);

        // $sertifikat = Sertifikat::latest()->paginate(10);
        // dd($sertifikat);

         return view ('template_design.index', compact('sertifikat')); //supaya ambil data template design
    }
  
    
    public function create(): View
    {
         return view('template_design.create');
    }    

     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // Validate form
    $this->validate($request, [
        'nama_template' => 'required|min:3',
        'gambar_template' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    // Upload image
    $image = $request->file('gambar_template'); 
    $image->storeAs('public/template_design', $image->hashName());

    // Create post
    Sertifikat::create([
        'nama_template' => $request->nama_template,
        'gambar_template' => $image->hashName(),
    ]);

    // Redirect to index
    return redirect()->route('template_design.index')->with(['success' => 'Data Berhasil Disimpan!']);
}

    
    public function destroy($template_design): RedirectResponse
    {
        //get post by ID
        $sertifikat = Sertifikat::findOrFail($template_design);

        //delete image
        Storage::delete('public/template_design/'. $sertifikat->image); //delete di data di adalam folder

        //delete post
        $sertifikat->delete(); //deelete data di dalam database

        //redirect to index
        return redirect()->route('template_design.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $sertifikat = Sertifikat::findOrFail($id);

        //render view with post
        // return view('template_design.edit', compact('sertifikat'));

        // Mengirimkan data template ke tampilan edit
        return view('template_design.edit', ['sertifikat' => $sertifikat]) ->with('success', 'Data berhasil diperbarui');

        
    }
    
    /**
 * update
 *
 * @param  mixed $request
 * @param  mixed $id
 * @return RedirectResponse
 */
public function update(Request $request, $id): RedirectResponse
{
    //validate form
    $this->validate($request, [
        'nama_template'   => 'required|min:3',
        'gambar_template' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    //get post by ID
    $sertifikat = Sertifikat::findOrFail($id);

    //check if image is uploaded
    if ($request->hasFile('gambar_template')) {
        //upload new image
        $image = $request->file('gambar_template');
        $image->storeAs('public/template_design', $image->hashName());

        //delete old image
        Storage::delete('public/template_design/' . $sertifikat->gambar_template);

        //update post with new image
        $sertifikat->update([
            'nama_template'    => $request->nama_template,
            'gambar_template' => $image->hashName()
        ]);
    } else {
        //update post without image
        $sertifikat->update([
            'nama_template'    => $request->nama_template,
        ]);
    }

    //redirect to index
    return redirect()->route('template_design.index')->with(['success' => 'Data Berhasil Diubah!']);
}


    // public function show(string $id): View
    // {
    //     //get post by ID
    //     $post = Post::findOrFail($id);

    //     //render view with post
    //     return view('template_design.show', compact('sertifikat'));
    // }
}
    
