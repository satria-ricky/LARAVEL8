<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudioController extends Controller
{
    public function getPeta()
    {
        
        $data = Studio::all();
       
        return response()->json($data);
    }
}
