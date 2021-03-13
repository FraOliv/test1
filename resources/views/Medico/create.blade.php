@extends('layouts.dashboard')

@section('content')
<h1>Create</h1>
<form action="{{route('medico.profilo.store')}}" method="post"  enctype="multipart/form-data" >
    @csrf
    @method('POST')
   

<div class="form-group">
    
    <label for="genere">Genere</label><br>
    <input type="radio" id="M" name="genere" value="maschio">
    <label for="male">Maschio</label><br>
    <input type="radio" id="F" name="genere" value="femmina">
    <label for="female">Femmina</label><br>
</div>

<div class="form-group">
    <label for="bio">bio</label>
    <textarea class="form-control" name="bio" id="bio" rows="3" required></textarea>
    <small class="text-muted">Inserisci qui la tua bio</small>
</div>

<div class="form-group">
    <label for="foto">inserisci la tua foto </label>
    <textarea class="form-control" name="foto" id="foto" rows="3" required></textarea>
    <small class="text-muted">Inserisci la tua foto pazzesca</small>
</div>


<div class="form-group">
    <label for="cellulare">cellulare</label>
    <input type="text" name="cellulare" id="cellulare" >
    <small class="text-muted">Inserisci il tuo num di cellulare</small>
</div>

 <div class="form-group">
    <label for="città">città</label>
    <input type="text" name="città" id="città" >
    <small class="text-muted">Inserisci la tua città</small>
  </div>
   <div class="form-group">
    <label for="città">P.IVA</label>
    <input type="text" name="piva" id="piva" >
    <small class="text-muted">Inserisci la tua PIVA</small>
  </div>
<div class="form-group">
    
    <label for="disabilità">disabilità</label><br>
    <input type="radio"  name="disabilità" value="1">
    <label for="disabilità">Specializzato in trattamenti su pazienti con disabilità</label><br>
    <input type="radio"  name="disabilità" value="0">
    <label for="disabilità">Non specializzato</label><br>
</div>




 {{--           <div class="form-group">
            <label for="cover">Cover</label>
    <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="fileHelpId">
    <small id="fileHelpId" class="form-text text-muted">Add a cover image for the current Novel</small>
           </div> --}}
  
<button type="submit" class="btn btn-primary">
    Submit
</button>

</form>
@endsection