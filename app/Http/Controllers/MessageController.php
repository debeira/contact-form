<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Inertia\Inertia;

class MessageController extends Controller
{
    public function index()
    {
        return Inertia::render('Messages/Index', [
            'messages' => Message::latest()->paginate(5)
                ->through(fn ($m) => [
                    'id' => $m->id,
                    'name' => $m->name,
                    'email' => $m->email,
                    'message' => $m->message,
                    'read_at' => $m->read_at,
                    'created_at' => $m->created_at->diffForHumans(),
                ]),
        ]);
    }

    public function markRead(Message $message)
    {
        $message->update(['read_at' => now()]);
        return back()->with('message', 'Gemarkeerd als gelezen.');
    }
}
