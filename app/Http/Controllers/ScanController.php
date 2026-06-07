<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Disease;
use App\Models\ScanResult;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    public function analyze(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:10240',
        ]);

        try {
            // Store image
            $path = $request->file('image')->store('uploads', 'public');

            // Send to Flask API
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $path)),
                $request->file('image')->getClientOriginalName()
            )->post('http://127.0.0.1:5001/'); //change this according to the port that u used!

            if ($response->failed()) {
                // Flask returned an error (e.g., 500)
                return redirect()->back()->with('error', 'Error: Please use another image.');
            }

            $data = $response->json();
            $data['image_path'] = $path;

            // Save scan result
            $scanResult = ScanResult::create([
                'user_id'    => Auth::id(),
                'prediction' => $data['prediction'] ?? 'N/A',
                'confidence' => $data['confidence'] ?? 0,
                'image_path' => $path,
            ]);

            // Fetch disease info
            $disease = Disease::where('disease_name', $data['prediction'])->first();

            return view('scan-result', [
                'data' => $data,
                'disease' => $disease
            ]);

        } catch (\Exception $e) {
            // Catch any exception (e.g., Flask not running, network error, etc.)
            return redirect()->back()->with('error', 'Error: Please use another image.');
        }

        // Fallback (rarely reached)
        return redirect()->back()->with('error', 'Unexpected error occurred. Please try again.');
    }

    public function show($id)
    {
        $scan = ScanResult::findOrFail($id);

        return view('show', compact('scan'));
    }
}
