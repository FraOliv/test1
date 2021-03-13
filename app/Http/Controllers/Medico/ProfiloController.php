<?php

namespace App\Http\Controllers\Medico;
use App\User;
use App\Profile;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProfiloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medici = User::all();
        $medico = Auth::user();
        return view('Medico.profilo', compact('medici','medico'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medico = Auth::user();
        return view('Medico.create', compact($medico));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $dati_validati = $request->validate([
            'user_id' => 'user_id',
            'genere' => 'required',
            'bio' => 'nullable',
            'foto' => 'nullable',
            'cellulare' => 'required',
            'città' => 'required',
            'piva' => 'required',
            'disabilità' => 'required',
        ]);

        $medico =Auth::user()->id;
        $dati_validati['user_id'] = $medico;
        Profile::create($dati_validati);
     
        return redirect('medico/profilo')->with('success', 'Profile saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        return view('medico.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
