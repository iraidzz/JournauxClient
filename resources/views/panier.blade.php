@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>PANIER</b></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date debut abonnement</th>
                                <th>Prix</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sum=0 ?>
                            @foreach ($panier as $patate)
                                <tr>
                                    <td>{{  $patate['publication']['titre'] }}</td>
                                    <td>{{  $patate['date_debut'] }}</td>
                                    <td>{{  $patate['prix'] }}</td>
                                    <?php $sum+=$patate['prix'] ?>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="col-lg-1"><btn class="btn btn-block disabled"> <b>Vous devez payer : <?php echo $sum ?>€</b></btn></div>
                        <div class="col-lg-1"><a class="btn btn-block btn-warning" href="/paiement".$sum> <b>Payer</b></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
