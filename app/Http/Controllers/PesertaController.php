<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//import Model
use App\Models\Peserta;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;


class PesertaController extends Controller
{
    public function index(): View 
    {  

        $peserta = Peserta::paginate(10);

        // Mengambil ID user yang sedang login
        $userId = auth()->id();

        // Mengambil semua data entry milik user yang sedang login
        $peserta = Peserta::where('user_id', $userId)->get();

         return view ('tbl_peserta.index', compact('peserta')); 
    }



    public function create(): View
    {
         return view('tbl_peserta.create');
    }    


    public function destroy($tbl_peserta): RedirectResponse
    {
         //get post by ID
         $peserta = Peserta::findOrFail($tbl_peserta);
 
         //delete image
        //  Storage::delete('public/template_design/'. $sertifikat->image); //delete di data di adalam folder
 
         //delete post
         $peserta->delete(); //delete data di dalam database
 
         //redirect to index
         return redirect()->route('tbl_peserta.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

     /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        
        //validate form
        $this->validate($request, [
            // 'user_id' => 'required|integer',
            // 'event_id' => 'required|integer',
            'peserta_name'   => 'required|min:5',
            'nis'     => 'required|min:5',
            'class'     => 'required|min:1',
            'school'     => 'required|min:3',
            'status'     => 'required|integer|between:1,5',

        ]);

        //upload image
        // $image = $request->file('gambar_template'); 
        // $image->storeAs('public/template_design', $image->hashName());

        //create post
        Peserta::create([
            'user_id'  => auth()->user()->id,
            //  'event_id' => $request->event_id,
             'event_id' =>1,
            'peserta_name'    => $request->peserta_name,
            'nis'     => $request->nis,
            'class'     => $request->class,
            'school'     => $request->school,
            'status'     => $request->status

        ]);

        //redirect to index
        return redirect()->route('tbl_peserta.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $peserta = Peserta::findOrFail($id);

        // Mengirimkan data template ke tampilan edit
        return view('tbl_peserta.edit', ['peserta' => $peserta]);
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
        // 'user_id' => 'required|integer',
        // 'event_id' => 'required|integer',
        'peserta_name' => 'required|min:5',
        'nis'          => 'required|min:5',
        'class'        => 'required|min:1',
        'school'       => 'required|min:3',
        'status'       => 'required|min:1',
    ]);

    //find peserta by ID
    $peserta = Peserta::findOrFail($id);

    //update peserta
    $peserta->update([
        // 'user_id'  => $request->user_id,
        // 'event_id' => $request->event_id,
        'peserta_name' => $request->peserta_name,
        'nis'          => $request->nis,
        'class'        => $request->class,
        'school'       => $request->school,
        'status'       => $request->status,
    ]);

    //redirect to index
    return redirect()->route('tbl_peserta.index')->with(['success' => 'Data Berhasil Diperbarui!']);
}

/**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $peserta = Peserta::findOrFail($id);

        //render view with post
        return view('tbl_peserta.show', compact('peserta'));
    }
  
}