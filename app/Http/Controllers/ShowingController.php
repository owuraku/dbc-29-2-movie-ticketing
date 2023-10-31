<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showing;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketSold;



class ShowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showings = Showing::active()->orderBy('showing_datetime', 'asc')
                    ->get();
                    
        return view('showings.index')
                ->with(['showings' => $showings]);
    }

    public function getAll() {
        return  Showing::active()->orderBy('showing_datetime', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Showing $showing)
    {
        // $showing = Showing::findOrFail($id);
        return view('showings.show')->with(['showing'=> $showing]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function buyTicket(Request $request, Showing $showing){
        $available = $showing->ticketsAvailable();
        $data = $request->validate([
            'number_of_tickets' => [ 'required', 'min:1', 'numeric', "max:$available"]
        ]);
        $ticketsBought = [];
        for ($i = 0; $i < $data['number_of_tickets']; $i++){
            $ticketsBought[] =  $showing->tickets()->create(['user_id' => Auth::user()->id]);
        }

        // send notification to user
        Mail::to(Auth::user()->email)->send(new TicketSold(Auth::user()->name, collect($ticketsBought)));
        
        // Auth::user()->tickets()->create(['showing_id' => $showing->id]);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Purchase was successful'
        ]);


        
    }
}
