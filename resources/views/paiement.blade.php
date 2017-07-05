@extends('layouts.template')
@section('content')

        <div class="col-md-offset-3 col-md-6 text-center">

            <form role="form" action="{{url('/client/paiementfinal')}}" method="post">
                {!! csrf_field() !!}
                <div class="row">

                    <input name="id" disabled type="text" class="form-control" value="{{ $id }}">

                    <div class="form-group col-lg-6">
                        <label>UUID (identifiant unique de l'entreprise)</label>
                        <input name="UUID" disabled type="text" class="form-control" value="97a53bb0-c73b-06c4-df5a-136dd6f8deec">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cid (identifiant paiment coté entreprise (texte))</label>
                        <input name="cid" disabled type="text" class="form-control" value="JournauxEnfolie">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cardnumber (numero carte bancaire (texte))</label>
                        <input name="cardnumber" type="number" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>cardmonth (mois d'expiration de la carte (entier))</label>
                        <input name="cardmonth" type="number" class="form-control" value="">
                    </div>


                    <div class="form-group col-lg-6">
                        <label>cardyear (année d'expiration de la carte (entier))</label>
                        <input name="cardyear" type="number" class="form-control" value="">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>amount (montant (réel,séparateur:.)</label>
                        <input name="amount" disabled type="number" class="form-control" value="{{  $prix }}">
                    </div>
                    <div class="form-group col-lg-12">
                        <center><button type="submit" class="btn btn-warning">Finaliser le payement</button></center><br>
                        {{--<a class="btn btn-warning" href="/client/paiementfinal"> <b><u>Finaliser le Payement</u></b></a>--}}
                    </div>
                </div>
            </form>
        </div>

@endsection
