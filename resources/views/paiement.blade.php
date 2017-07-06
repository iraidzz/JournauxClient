@extends('layouts.template')
@section('content')

        <div class="col-md-offset-3 col-md-6 text-center">

            <form role="form" action="{{url('/client/paiementfinal')}}" method="post">
                {!! csrf_field() !!}
                <div class="row">

                    <div class="form-group col-lg-6">
                        <label>ID client</label>
                        <input name="clientid" type="hidden" class="form-control" value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">
                        <input name="clientid_affichage" disabled class="form-control" value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>UUID (identifiant unique de l'entreprise)</label>
                        <input name="uuid" type="hidden" class="form-control" value="97a53bb0-c73b-06c4-df5a-136dd6f8deec">
                        <input name="uuid_affichage" disabled class="form-control" value="97a53bb0-c73b-06c4-df5a-136dd6f8deec">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cid (identifiant paiment coté entreprise (ID de l'article))</label>
                        <input name="cid" type="hidden" class="form-control" value="{{ $id }}">
                        <input name="cid_affichage" disabled class="form-control" value="{{ $id }}">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cardnumber (numero carte bancaire (texte))</label>
                        <input name="cardnumber" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cardmonth (mois d'expiration de la carte (entier))</label>
                        <input name="cardmonth" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cardyear (année d'expiration de la carte (entier))</label>
                        <input name="cardyear" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>amount (montant (réel,séparateur:.)</label>
                        <input name="amount" type="hidden" class="form-control" value="{{  $prix }}">
                        <input name="amount_affichage" disabled class="form-control" value="{{  $prix }}">
                    </div>
                    <div class="form-group col-lg-12">
                        <center><button type="submit" class="btn btn-warning">Finaliser le payement</button></center><br>
                    </div>
                </div>
            </form>
        </div>

@endsection
