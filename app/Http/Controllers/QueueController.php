<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    private $queueNames = ['Sala A', 'Sala B', 'Sala C'];

    public function index()
    {
        return view('index', ['queueNames' => $this->queueNames]);
    }

    public function generateTicket(Request $request)
    {
        $request->validate([
            'queue_name' => 'required|string',
            'is_preferential' => 'required|boolean',
        ]);

        $newTicket = DB::transaction(function () use ($request) {
            $lastTicket = Queue::where('queue_name', $request->queue_name)
                               ->lockForUpdate()
                               ->max('ticket_number') ?? 0;
            $newTicket = $lastTicket + 1;

            return Queue::create([
                'queue_name' => $request->queue_name,
                'ticket_number' => $newTicket,
                'is_preferential' => $request->is_preferential,
                'status' => 'waiting'
            ]);
        });

        return response()->json([
            'queue_name' => $newTicket->queue_name,
            'ticket_number' => $newTicket->ticket_number,
            'is_preferential' => $newTicket->is_preferential
        ]);
    }

    public function attendantView()
    {
        $user = Auth::user();
        $currentTicket = $this->getNextTicket($user->queue);
        return view('attendant', compact('user', 'currentTicket'));
    }

    public function callNext(Request $request)
    {
        $user = Auth::user();
        $nextTicket = $this->getNextTicket($user->queue);

        if ($nextTicket) {
            $nextTicket->update(['status' => 'called']);
            $newCurrentTicket = $this->getNextTicket($user->queue);
            return response()->json([
                'queue_name' => $user->queue,
                'ticket_number' => $newCurrentTicket ? $newCurrentTicket->ticket_number : null,
                'is_preferential' => $newCurrentTicket ? $newCurrentTicket->is_preferential : null
            ]);
        }

        return response()->json([
            'queue_name' => $user->queue,
            'ticket_number' => null,
            'is_preferential' => null
        ]);
    }

    private function getNextTicket($queueName)
    {
        return Queue::where('queue_name', $queueName)
                    ->where('status', 'waiting')
                    ->orderBy('is_preferential', 'desc')
                    ->orderBy('ticket_number')
                    ->first();
    }

    public function getCurrentTicket(Request $request)
    {
        $user = Auth::user();
        $nextTicket = $this->getNextTicket($user->queue);
        return response()->json($nextTicket ? [
            'ticket_number' => $nextTicket->ticket_number,
            'is_preferential' => $nextTicket->is_preferential
        ] : null);
    }
}
