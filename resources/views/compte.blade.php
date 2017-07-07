@extends('layouts.template')
@section('content')

    @foreach ($compteinfo as $patate)
        <div class="col-md-offset-3 col-md-6 text-center">

            <h4 style="font-family: 'Courier New'; font-size: 25px"><i>Informations du compte</i></h4>
            <hr>

    <form>
        {!! csrf_field() !!}
        <div class="row">
            <div class="form-group col-lg-6">
                <label>Genre</label>
                <input name="name" disabled type="text" class="form-control" value="{{  $patate['civilite'] }}">
            </div>

            <div class="form-group col-lg-6">
                <label>Nom</label>
                <input name="name" disabled type="text" class="form-control" value="{{  $patate['name'] }}">
            </div>

            <div class="form-group col-lg-6">
                <label>Prénom</label>
                <input name="prenom" disabled type="text" class="form-control" value="{{  $patate['prenom'] }}">
            </div>

            <div class="form-group col-lg-6">
                <label>Email</label>
                <input name="email" disabled type="email" class="form-control" value="{{  $patate['email'] }}">
            </div>


            <div class="form-group col-lg-6">
                <label>Numero de téléphone</label>
                <input name="numero_telephone" disabled type="text" class="form-control" value="{{  $patate['numero_telephone'] }}">
            </div>
            <div class="col-lg-1"><a class="btn btn-warning" href="/client/affichereditcompte/{{ $patate['id']}}"> <b><u>Détails</u></b></a></div>

        </div>
    </form>
        </div>

@endforeach
@endsection
