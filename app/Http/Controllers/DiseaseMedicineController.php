<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiseaseMedicineController extends Controller
{
    public function index()
    {
        // Fetch all rows from the `diseases` table
        $items = DB::table('diseases')->get();

        // Pass them to the Blade as $items
        return view('diseasemedicine', compact('items'));
    }
}
