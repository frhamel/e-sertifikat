<?php

namespace App\Http\Controllers;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

use App\Models\DataUser;
use Illuminate\Support\Facades\Hash;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class DataUserController extends Controller
{
    public function index() : View
    {
        $datauser = Datauser::paginate(10); // Paginate with 10 records per page
    
        return view('data_users.index', compact('datauser'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $datauser = Datauser::findOrFail($id);

        //render view with post
        // return view('template_design.edit', compact('sertifikat'));

        // Mengirimkan data template ke tampilan edit
        return view('data_users.edit', ['datauser' => $datauser]);
    }

   /**
 * update
 *
 * @param  Request $request
 * @param  int $id
 * @return RedirectResponse
 */
public function update(Request $request, $id): RedirectResponse
{
    // dd($request);
    // Validasi data
    $validated = $request->validate([
        'name'     => 'required|min:3',
        'email'    => 'required|email|min:8',
        // 'password' => 'nullable|min:4',
    ]);

    // Dapatkan pengguna berdasarkan ID
    $datauser = Datauser::findOrFail($id);
    // dd($datauser);
    
    // Jika password disediakan, hash password sebelum menyimpannya 
    if (isset($request->password)) {
        $validated['password'] = Hash::make($request->password); //bcrypt($request->password);
    } 
    // dd($request->password, bcrypt('12345678'), bcrypt($request->password), $validated);
    // dd($validated['password']);
    // Perbarui data pengguna
    $datauser->update($validated);

    // Redirect ke halaman index dengan pesan sukses
     return redirect()->route('data_users.index')->with(['success' => 'Data Berhasil Diubah!']);
}


    public function destroy($data_users): RedirectResponse
    {
        //get post by ID
        $datauser = Datauser::findOrFail($data_users);

        //delete image
        // Storage::delete('public/data_users/'. $sertifikat->image); //delete di data di adalam folder

        //delete post
        $datauser->delete(); //delete data di dalam database

        //redirect to index
        return redirect()->route('data_users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}