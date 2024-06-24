<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Template_design; 
use PDF;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller 
{
    /**
     * Menampilkan daftar resource.
     */
    public function index(Request $request)
    {
        // Mengambil semua event
        $event = Event::all();
        
        $template_design = [
            'template_id'     => 1,
            'gambar_template' => 'images/template_design.png',
            'nama_template'   => 'Template 1'
        ];
        
        return view('tbl_event.index', compact('event', 'template_design'));
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create(Request $request)
    {
        return view('tbl_event.create');
    }

    /**
     * Menyimpan resource baru ke dalam storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $this->validate($request, [
            'title'       => 'required|min:3',
            'event_date'  => 'required',
            'nama_ttd'    => 'required|min:3',
            'ttd'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'logo_event'  => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Simpan gambar
        $ttd = $request->file('ttd');
        $ttd->storeAs('public/tbl_event', $ttd->hashName());

        $logo_event = $request->file('logo_event');
        $logo_event->storeAs('public/tbl_event', $logo_event->hashName());

        // Buat event baru
        Event::create([
            'user_id'     => auth()->user()->id,
            'template_id' => 1,
            'title'       => $request->title,
            'event_date'  => $request->event_date,
            'nama_ttd'    => $request->nama_ttd,
            'ttd'         => $ttd->hashName(),
            'logo_event'  => $logo_event->hashName()
        ]);

        // Redirect ke index
        return redirect()->route('tbl_event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(string $id): View
    {
        // Mengambil event berdasarkan ID
        $event = Event::findOrFail($id);

        // Render view dengan event
        return view('tbl_event.show', compact('event'));
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(string $id): View
    {
        // Mengambil event berdasarkan ID
        $event = Event::findOrFail($id);

        // Render view dengan event
        return view('tbl_event.edit', compact('event'));
    }

    /**
     * Mengupdate resource yang spesifik dalam storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validasi form
        $this->validate($request, [
            'title'       => 'required|min:3',
            'event_date'  => 'required',
            'nama_ttd'    => 'required|min:3',
            'ttd'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'logo_event'  => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Mengambil event berdasarkan ID
        $event = Event::findOrFail($id);

        // Cek apakah ttd diunggah
        if ($request->hasFile('ttd')) {
            $ttd = $request->file('ttd');
            $ttd->storeAs('public/tbl_event', $ttd->hashName());
            Storage::delete('public/tbl_event/'.$event->ttd);
            $event->ttd = $ttd->hashName();
        }

        // Cek apakah logo_event diunggah
        if ($request->hasFile('logo_event')) {
            $logo_event = $request->file('logo_event');
            $logo_event->storeAs('public/tbl_event', $logo_event->hashName());
            Storage::delete('public/tbl_event/'.$event->logo_event);
            $event->logo_event = $logo_event->hashName();
        }

        // Update event
        $event->update([
            'title'       => $request->title,
            'event_date'  => $request->event_date,
            'nama_ttd'    => $request->nama_ttd,
            'ttd'         => $event->ttd, // Update hanya jika diubah
            'logo_event'  => $event->logo_event // Update hanya jika diubah
        ]);

        // Redirect ke index
        return redirect()->route('tbl_event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Mengambil event berdasarkan ID
        $event = Event::findOrFail($id);

        // Hapus gambar
        Storage::delete('public/tbl_event/'.$event->ttd);
        Storage::delete('public/tbl_event/'.$event->logo_event);

        // Hapus event
        $event->delete();

        // Redirect ke index
        return redirect()->route('tbl_event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
 * Menampilkan form template untuk resource yang spesifik.
 */
public function template(string $id): View
{
   
    $event = Event::findOrFail($id);
    $template_design = Template_design::all(); // atau filter sesuai kebutuhan Anda
   
    return view('tbl_event.template', compact('event', 'template_design'));
}

/**
 * Menyimpan template untuk resource yang spesifik.
 */
public function saveTemplate(Request $request, $id)
{
    // dd($request->all());
    // $request->validate([
    //     'template_id' => 'required|exists:template_design,template_id',
    // ]);

    $event = Event::findOrFail($id);
    $event->template_id = $request->template_id; // Perubahan dari template_design ke template_id
    $event->save();

    return redirect()->route('tbl_event.index')->with('success', 'Template berhasil disimpan');
}

// Method to generate PDF
public function generatePDF($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect()->route('tbl_event.index')->with('error', 'Event not found');
        }

        $pdf = PDF::loadView('event.generatePDF', compact('event'));
        return $pdf->download('event_id' . $event->event_id . '.pdf');
    }

}