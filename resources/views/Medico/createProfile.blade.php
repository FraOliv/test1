@extends('layouts.dashboard')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br/>
  @endif
  <form action="{{route('medico.profilo.update',$medico->id)}}" method="post" enctype="multipart/form-data">
    @method('PATCH') 
    @csrf
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">

            @if (optional($medico->profile)->foto)
              <img src="{{asset( 'storage/'.$medico->profile->foto)}}" alt="foto profilo"
              style="width: 150px; border-radius:10px">              
            @else
              <img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">
            @endif
            <div class="form-group">
              <label for="foto"><i class="far fa-images"style="font-size: 40px; color: blue; margin-top: 20px; cursor: pointer;" title="Carica immagine profilo"></i></label>
              <input type="file" class="form-control-file" name="foto" id="foto" placeholder="cerca" aria-describedby="fotoHelper" 
              style="
                opacity: 0;
                position: absolute;
                z-index: -1;">
              <small id="fotoHelper" class="form-text text-muted">Carica la tua foto profilo</small>
            </div>
            @error('foto')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
        </div>
        <div class="col-md-5 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile Settings</h4>

          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label for="nome" class="labels">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="first name" value="{{$medico->nome}}">
            </div>
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-md-6">
              <label for="cognome" class="labels">Cognome</label>
              <input type="text" name="cognome" class="form-control" value="{{$medico->cognome}}" placeholder="surname">
            </div>
            @error('cognome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="email" class="labels">Email</label>
              <input type="text" name="email" class="form-control" value="{{$medico->email}}" placeholder="email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="cellulare"  class="labels">Contact Number</label>
              <input type="text" name="cellulare" class="form-control" value="{{optional($medico->profile)->cellulare}}" placeholder="number">
            </div>
            @error('cellulare')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="indirizzo" class="labels">Indirizzo</label>
              <input type="text" name="indirizzo" class="form-control" value="{{$medico->indirizzo}}" placeholder="address">
            </div>
            @error('indirizzo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="città" class="labels">Città</label>
              <input type="text" name="città" class="form-control" value="{{optional($medico->profile)->città}}" placeholder="address">
            </div>
            @error('città')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="piva" class="labels">PIVA</label>
              <input type="text" name="piva" class="form-control" value="{{optional($medico->profile)->piva}}" placeholder="address">
            </div>
            @error('piva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-3">
              <h4>Genere</h4>
              <label for="genere" class="labels"><i class="fas fa-male"></i> Uomo</label>
              <input type="radio" class="form-control" value="maschio" name="genere" {{optional($medico->profile)->genere === 'maschio' ? 'checked' : ''}}>

              <label for="genere" class="labels"><i class="fas fa-female"></i> Donna </label>
              <input type="radio" id="donna" class="form-control" value="femmina" name="genere" {{optional($medico->profile)->genere === 'femmina' ? 'checked' : ''}}>
            </div>
            @error('genere')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group col-2">
                <label for="disabilità">Attenzione alle disabilità:</label>
                <input type="checkbox" name="disabilità" class="switch-input" value="1" {{ optional($medico->profile)->disabilità === 1 ? 'checked="checked"' : '' }}/>
            </div>
            @error('disabilità')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="form-group">
              <label for="cv"><i class="fas fa-file-pdf"style="font-size: 40px; color: blue; margin-top: 20px; cursor: pointer;" title="Carica il tuo cv"></i></label>
              <input type="file" class="form-control-file" name="cv" id="cv" placeholder="cerca" accept="{{-- image/*, --}}.pdf" aria-describedby="cvHelper" style="
                opacity: 0;
                position: absolute;
                z-index: -1;">
              <small id="cvHelper" class="form-text text-muted">Carica il tuo cv.pdf/img</small>
            </div>
            @error('cv')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      

      </div>
      <div class="col-md-4">
          <div class="p-3 py-5">
            <div class="d-flex flex-column justify-content-between align-items-center experience">
              <div class="row mt-2">
                <div class="form-group col-md-12">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" class="form-control " name="bio" cols="50" rows="10">{{optional($medico->profile)->bio}}</textarea>
                </div>
                @error('bio')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              {{-- <div class="row mt-2">
                <div class="form-group col-md-12">
                    <label for="bio">Qui potrebbe andare il form del CV:</label>
                    <textarea id="bio" class="form-control " name="bio" cols="50" rows="10">{{$medico->profile->bio}}</textarea>
                </div>
                @error('bio')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div> --}}
            </div>
          </div>
          <div class="col-md-12 d-flex justify-content-center align-items-center p-3">
            <button type="submit" class="btn btn-primary d-flex justify-content-center"><i class="fas fa-sign-in-alt px-3"></i><i class="fas fa-user"></i></button>
    
          </div>
      </div>
    </div>
  </form>
@endsection