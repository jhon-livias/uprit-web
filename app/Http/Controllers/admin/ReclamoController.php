<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reclamo;

class ReclamoController extends Controller
{
    //
    public function index()
    {
        return view('admin.pages.libro_reclamaciones.index');
    }

    public function getReclamos(){
        $reclamos = Reclamo::orderby('fecha', 'desc')->get();
        return response()->json($reclamos);
    }

    public function delete($id)
    {
        $reclamo = Reclamo::find($id);
        $reclamo->delete();
        return response()->json(true);
    }
}
