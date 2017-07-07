@extends('layouts.template')
@section('content')

        <div class="col-md-offset-3 col-md-6 text-center">

            <h4 style="font-family: 'Courier New'; font-size: 25px"><i>Informations paiement</i></h4>
            <hr>


            <form role="form" action="{{url('/client/paiementfinal')}}" method="post">
                {!! csrf_field() !!}
                <div class="row">

                    {{--<div class="form-group col-lg-6">--}}
                        {{--<label>ID client</label>--}}
                        <input name="clientid" type="hidden" class="form-control" value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">
                        {{--<input name="clientid_affichage" disabled class="form-control" value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">--}}
                    {{--</div>--}}

                    {{--<div class="form-group col-lg-6">--}}
                        {{--<label>Identifiant unique de l'entreprise</label>--}}
                        <input name="uuid" type="hidden" class="form-control" value="97a53bb0-c73b-06c4-df5a-136dd6f8deec">
                        {{--<input name="uuid_affichage" disabled class="form-control" value="97a53bb0-c73b-06c4-df5a-136dd6f8deec">--}}
                    {{--</div>--}}

                    {{--<div class="form-group col-lg-6">--}}
                        {{--<label>ID de l'article</label>--}}
                        <input name="cid" type="hidden" class="form-control" value="{{ $id }}">
                        {{--<input name="cid_affichage" disabled class="form-control" value="{{ $id }}">--}}
                    {{--</div>--}}

                    <div class="form-group col-lg-6">
                        <label>Numero carte bancaire</label>
                        <input type="text" maxlength="10" name="cardnumber" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" value="" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Mois d'expiration de la carte (MM)</label>
                        <input type="text" maxlength="2" name="cardmonth" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" value="" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Année d'expiration de la carte (YYYY)</label>
                        <input type="text" maxlength="4" name="cardyear" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" value="" required>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Montant à payer</label>
                        <input name="amount" type="hidden" class="form-control" value="{{  $prix }}">
                        <input name="amount_affichage" disabled class="form-control" value="{{  $prix }}">
                    </div>
                    <div class="form-group col-lg-12">
                        <center><button type="submit" class="btn btn-warning">Finaliser le paiement</button></center><br>
                    </div>
                </div>
            </form>
        </div>

@endsection
