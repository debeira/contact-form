<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return Inertia::render('Contact/Index');
    }

    public function store(Request $request)
    {
//        dd($request);
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'message'  => ['required'],
        ]);

        Message::create($fields);

        return back()->with('success', 'Bedankt! Je bericht is verzonden.');
    }
}
