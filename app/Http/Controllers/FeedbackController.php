<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index(){
        $feedback = Feedback::with('user')->latest()->get();
        return view('feedback.index',compact('feedback'));
    }

    public function store(Request $request){
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);
        Feedback::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success','Feedback submitted successfully');
    }
    public function reply(Request $request, Feedback $feedback){
        // Only allow admins to reply
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'feedback_reply' => 'required|string|max:1000',
        ]);

        $feedback->update([
            'feedback_reply' => $request->feedback_reply,
        ]);

        return redirect()->back()->with('success', 'Reply added successfully');
    }
}
