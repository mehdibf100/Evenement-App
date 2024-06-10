<?php

namespace App\Http\Controllers;
use App\Models\Evenement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Evenement::all();
       //return view('evenement.index')->with('data', $data)->with('data', $data);
    }
    public function dashboard()
    {
        $data = Evenement::all();
        return view('dashboard')->with('data', $data);
    }
    public function mesEvenements()
    {
        $data = Evenement::all();
        return view('mesevenements')->with('data', $data); // Assurez-vous que cette vue existe
    }


     /* Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Evenement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'evenement-titre'=>'required',
            'evenement-type'=>'required',
            'evenement-prix'=>['required','integer'],
            'evenement-lieu'=>'required',
            'evenement-temps'=>'required',
            'evenement-desc'=>'required',
            'evenement_image'=>'required',
        ]);

   $file_extension= $request->evenement_image->getClientOriginalExtension();
    $fileName=time(). '.'.$file_extension;
    $path='img';
    $request->evenement_image->move($path,$fileName);

        $evenement=new evenement();
        $evenement->image=$fileName;
        $evenement->titre=strip_tags($request->input('evenement-titre'));
        $evenement->type=strip_tags($request->input('evenement-type'));
        $evenement->prix=strip_tags($request->input('evenement-prix'));
        $evenement->lieu=strip_tags($request->input('evenement-lieu'));
        $evenement->temps=strip_tags($request->input('evenement-temps'));
        $evenement->description=strip_tags($request->input('evenement-desc'));
        $userId = Auth::id();
        $evenement->user_id = $userId;
        $evenement->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($evenement)
    {
        $index=Evenement::findOrFail($evenement);
        return view('Evenement.show',['evenement'=>$index]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($evenement)
    {
        return view('Evenement.edit',['evenement'=>Evenement::findOrFail($evenement)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $evenement)
    {   $request->validate([
        'evenement-titre'=>'required',
        'evenement-type'=>'required',
        'evenement-prix'=>['required','integer'],
        'evenement-lieu'=>'required',
        'evenement-temps'=>'required',
        'evenement-desc'=>'required',
        'evenement_image'=>'required',
    ]);

        $file_extension= $request->evenement_image->getClientOriginalExtension();
        $fileName=time(). '.'.$file_extension;
        $path='img';
        $request->evenement_image->move($path,$fileName);
        $ToUpdate=Evenement::findOrFail($evenement);
        $ToUpdate->image=$fileName;
        $ToUpdate->titre=strip_tags($request->input('evenement-titre'));
        $ToUpdate->type=strip_tags($request->input('evenement-type'));
        $ToUpdate->prix=strip_tags($request->input('evenement-prix'));
        $ToUpdate->lieu=strip_tags($request->input('evenement-lieu'));
        $ToUpdate->temps=strip_tags($request->input('evenement-temps'));
        $ToUpdate->description=strip_tags($request->input('evenement-desc'));
        $userId = Auth::id();
        $$ToUpdate->user_id = $userId;
        $ToUpdate->save();
        return redirect()->route('evenement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($evenement)
    {
       $ToDelete=Evenement::findOrFail($evenement);
       $ToDelete->delete();
        return redirect()->route('evenement.index');
    }
}
