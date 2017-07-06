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
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sum=0 ?>
                            @if(isset($panier))
                                @foreach ($panier as $patate)
                                    <tr>
                                        <td>{{  $patate['publication']['titre'] }}</td>
                                        <td>{{  $patate['prix'] }}€</td>
                                        <td><a class="btn btn-block btn-warning" href="/client/paiement/{{ $patate['id'] }}/{{  $patate['prix'] }}"> <b>Payer</b></a></td>
                                        <?php $sum+=$patate['prix'] ?>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>


                        <?php
                        if($sum == 0)
                            {
                                Echo "Pas de paiement en attente";
                            }
                        ?>

                        <div class="col-lg-1"><btn class="btn btn-block disabled"> <b>Vous devez payer : <?php echo $sum ?>€</b></btn></div>
                        <div class="col-lg-1"><a class="btn btn-block btn-warning" href="/client/paiement/{{$sum}}"> <b>Payer la totalité</b></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
