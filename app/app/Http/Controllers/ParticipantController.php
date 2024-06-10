<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function index()
    {
        $data = Participant::with('user','evenement')->get();
       return view('participant')->with('data', $data)->with('data', $data);
    }
    public function store(Request $request)
    {

        // Valider les données reçues

        $participant=new participant();
        $userId = Auth::id();
        $participant->user_id=$userId;
        $participant->evenement_id=$request->input('event_id');
        $participant->save();
        return redirect()->route('dashboard');

    }
    public function show($evenement_id)
    {
        $participants = Participant::where('evenement_id', $evenement_id)->get();
        return view('participant', compact('participants'));
    }



}
