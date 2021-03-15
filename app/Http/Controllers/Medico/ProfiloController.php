<?php

namespace App\Http\Controllers\Medico;
use App\User;
use App\Profile;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        return view('Medico.createProfile', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Auth $medico)
    {
        //dd($request);
        /* $request['slug'] = Str::slug($medico->nome.$medico->cognome);
        dd($request['slug']); */
       /*  $dati_validati = $request->validate([
            'user_id' => 'user_id',
            'genere' => 'required',
            'bio' => 'nullable',
            'cv' => 'nullable | mimes:pdf|max:10000',
            'foto' => 'required | mimes:jpeg,jpg,png,gif | max:500',
            'cellulare' => 'required',
            'città' => 'required',
            'piva' => 'required',
            'disabilità' => 'required',
            'slug' => 'required'
        ]); */

        /* if ($request->foto) {
            $foto = Storage::put('foto_profilo', $request->foto);
            $validateDate['foto'] = $foto;
        }
        if ($request->cv) {
            $cv = Storage::put('cv_profilo', $request->cv);
            $validateDate['cv'] = $cv;
        }

        $medico =Auth::user()->id;
        $dati_validati['user_id'] = $medico;
        $newProfile=Profile::updateOrCreate(['user_id' => $medico],[$dati_validati]); */
    
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
    public function edit($id, Auth $medico)
    {
        //
        /* $profilo = Profile::find($id); */ //si raggiunge lo stesso obbiettivo ma si preferisce passare per la relazione tra utente autenticato e profilo associato 1 to 1
        $medico = Auth::user();
        //dd($medico,$medico->profile,$id/* ,$profilo */);
        return view('Medico.editProfile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        /* $request['slug'] = Str::slug($medico->nome.$medico->cognome);
        dd($request['slug']); */
        $dati_validati = $request->validate([
            'user_id' => 'user_id',
            'genere' => 'required',
            'bio' => 'nullable',
            'cv' => 'nullable | ',
            'foto' => 'nullable | image|mimes:jpeg,jpg,png,gif|max:10000',
            'cellulare' => 'required',
            'città' => 'required',
            'piva' => 'required',
            'disabilità' => 'nullable',
            /* 'slug' => 'required' */
        ]);
           // dd($dati_validati);
        $medico =Auth::user();
        /* $dati_validati['user_id'] = $medico->id; */
        
            //dd($request->foto);

            /* Gestione eventuali casistiche in fase di caricamento iniziale per l'immagine profilo*/
        if ($request->foto != null) {

            if (!isset($medico->profile->foto)) {
                $foto = Storage::put('doc_profilo', $request->foto);
            }
            if (isset($medico->profile->foto)) {
                Storage::delete('doc_profilo',$medico->profile->foto);
                $foto = Storage::put('doc_profilo', $request->foto);
            }
            
        } elseif(!isset($request->foto)) {
            if (!isset($medico->profile->foto)) {
                $foto = null;
                
            }
            if (isset($medico->profile->foto)) {
                $foto = $medico->profile->foto;
                
            }
        }

        /* Gestione eventuali casistiche in fase di caricamento iniziale per il cv */
        if ($request->cv != null) {

            if (!isset($medico->profile->cv)) {
                $cv = Storage::put('doc_profilo', $request->cv);
            }
            if (isset($medico->profile->cv)) {
                Storage::delete('doc_profilo',$medico->profile->cv);
                $cv = Storage::put('doc_profilo', $request->cv);
            }
            
        } elseif(!isset($request->cv)) {
            if (!isset($medico->profile->cv)) {
                $cv = null;
            }
            if (isset($medico->profile->cv)) {
                $cv = $medico->profile->cv;
            }
        }


        /* Questo mi permette di creare e aggiornare i dati in profiles dopo che sono stati validati */
        Profile::updateOrCreate([
            'user_id' => Auth::user()->id
        ],
        [
            'genere' => $request->get('genere'),
            'bio' => $request->get('bio'),
            'cv' => $cv,
            'foto' => $foto,
            'cellulare' => $request->get('cellulare'),
            'città' => $request->get('città'),
            'piva' => $request->get('piva'),
            'disabilità' => $request->get('disabilità'),
        ]);

        User::updateOrCreate([
            'id' => Auth::user()->id
        ],
        [
            'nome' => $request->get('nome'),
            'cognome' => $request->get('cognome'),
            'email' => $request->get('email'),
            'indirizzo' => $request->get('indirizzo'),
        ]);
        //dd($newProfile->foto);
        /* successivamente reindirizzereremo alla pagina di view del profilo del medico - show - al qualle implementeremo lo slug */
        return redirect('medico/home')->with('success', 'Profile saved!');
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
