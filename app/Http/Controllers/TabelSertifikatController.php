<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//import Model
use App\Models\TabelSertifikat;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;


class TabelSertifikatController extends Controller
{
    public function index(): View 
    {

        $tabelsertifikat = Tabelsertifikat::latest()->paginate(10);

         return view ('tbl_sertifikat.index', compact('tabelsertifikat')); 
    }
  
}
