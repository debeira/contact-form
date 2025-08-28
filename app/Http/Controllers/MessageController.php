<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index()
    {
        return Inertia::render('Messages/Index', [
            'messages' => Message::all()
        ]);
    }

    public function markRead(Message $message)
    {
        $message->update(['read_at' => now()]);
        return back()->with('message', 'Gemarkeerd als gelezen.');
    }
}
