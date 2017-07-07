@extends('layouts.template')
@section('content')

    @foreach ($compteinfo as $patate)
        <div class="container">
            <div class="row">
                <div class="box text-center">
                    <div class="col-lg-12 text-center">

                        <h4 style="font-family: 'Courier New'; font-size: 25px"><i>Modifier vos informations</i></h4>
                        <hr>

                    </div>
                    <div class="col-md-offset-3 col-md-6 text-center">
                        <form role="form" action="{{url('/client/edit')}}" method="post">
                            <input name="id" type="hidden" class="form-control" value="{{$patate['id']}}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <input name="user_id" type="hidden" value="" class="form-control">

                                <div class="form-group col-lg-6">
                                    <label>Genre</label>
                                    <select name="civilite" type="text" class="form-control">
                                        <?php
                                        if($patate['civilite']=='MR')
                                        {
                                        ?>
                                        <option value="MR" selected>MR</option>
                                        <option value="MME">MME</option>
                                        <?php
                                        }
                                        elseif($patate['civilite']=='MME')
                                        {
                                        ?>
                                        <option value="MR">MR</option>
                                        <option value="MME" selected>MME</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Nom</label>
                                    <input name="name" type="text" class="form-control" required value="{{  $patate['name'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Prénom</label>
                                    <input name="prenom" type="text" class="form-control" required value="{{  $patate['prenom'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" required value="{{  $patate['email'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input name="password" placeholder="Veuilliez re-taper votre mot de passe" type="password" class="form-control" required value="">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Numero de téléphone</label>
                                    <input name="numero_telephone" type="text" class="form-control" required value="{{  $patate['numero_telephone'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date de naissance</label>
                                    <input name="date_naissance" type="date" class="form-control" required value="{{  $patate['date_naissance'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Lieu naissance</label>
                                    <input name="lieu_naissance" type="text" class="form-control" required value="{{  $patate['lieu_naissance'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Adresse de domicile</label>
                                    <input name="adresse_domicile" type="text" class="form-control" required value="{{  $patate['adresse_domicile'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Code postal</label>
                                    <input name="postal_domicile" type="text" class="form-control" required value="{{  $patate['postal_domicile'] }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Ville</label>
                                    <input name="ville_domicile" type="text" class="form-control" required value="{{  $patate['ville_domicile'] }}">
                                </div>

                                <div class="form-group col-lg-12">
                                    <center><button type="submit" class="btn btn-warning">Modifier mes informations</button></center><br>
                                    {{--<a href="../../client/moncompte/{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}"  class="btn btn-info">Retour</a>--}}
                                    <a href="{{url('/client/moncompte/'.\Illuminate\Support\Facades\Cookie::get('CookieId'))}}"  class="btn btn-info">Retour</a>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    @endforeach
@endsection
