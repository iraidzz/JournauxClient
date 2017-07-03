@extends('layouts.template')
@section('content')
    <style>
        hr {
            height: 4px;
            margin-bottom:-3px;
        }
        .hr-primary{
            background-image: -webkit-linear-gradient(left, rgba(0,0,0,.6), rgba(246, 205, 85,.6), rgba(52,54,86,100));
        }

        .hr-input{
            background-image: -webkit-linear-gradient(left, rgba(0,0,0,0.3), rgba(255, 190, 0,.5), rgba(0,0,0,0.3));
        }
        .text-jaunefonce {
            color: #000000;
        }
    </style>

    @if($mesabonnements==null)  {{--Il n'y a riens à afficher--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="row">
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <h3><i>Vous n'avez pas d'abonnements à l'arrêt. Nous vous invitons à vous redirigez vers la liste des magazines. </i><br><br><u><a href="/magazine/lister">C'est par ici!</a></u></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else {{--Il y a du contenu à afficher--}}
    @foreach($mesabonnements as $article)
        <!-- Portfolio Grid Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 portfolio-item">

                        @foreach($publications as $pub)
                            @if($pub['id']==$article['publication_id'])
                                <!-- Portfolio Grid Section -->
                                    <div class="row" >
                                        <hr class="hr-primary" style="margin-top: 0px;" />
                                        <div class="col-lg-12 text-center">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item">
                                                    <div class="form-group col-xs-5">
                                                        <a href="#portfolioModal{{$pub['id']}}" class="portfolio-link" data-toggle="modal"><BR>
                                                            <img width="80px" height="80px" src="{{$pub['photo_couverture']}}" class="img-responsive img-centered" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-xs-7">
                                                        <BR><label>Nom</label>
                                                        <input type="text" class="hr-input text-jaunefonce" style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;" disabled value="{{$pub['titre']}}">
                                                        <label>Fin abonnement</label><br>
                                                        <input type="text" class="hr-input text-jaunefonce" style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;" disabled value="{{$article['date_fin']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-xs-12">
                                                    <a href="#portfolioModal{{$pub['id']}}" class="btn btn-primary" data-toggle="modal">
                                                        <i> Détail</i>
                                                    </a>
                                                    <?php
                                                    // On calcule depuis combien de temps l'abonnement est actif . S'il se termine dans les deux mois à venir , on active un bonton "Abonnement bientot terminé"
                                                    $datetime1 = date_create($article['date_fin']);
                                                    $datetime2 = date_create(date("Y-m-d"));
                                                    $interval = date_diff($datetime2,$datetime1);
                                                    if($interval->days<60) // 60 jours
                                                    {
                                                    ?>
                                                    <br><br>
                                                    <a href="#portfolioModal{{$pub['id']}}" class="glyphicon glyphicon-warning-sign btn btn-danger" data-toggle="modal">
                                                        <i> Abonnement bientôt terminé</i>
                                                    </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portfolio-modal modal fade" id="portfolioModal{{$pub['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="close-modal" data-dismiss="modal">
                                                    <div class="lr">
                                                        <div class="rl">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-lg-offset-2">
                                                            <div class="modal-body">
                                                                <form class="form" action="{{url('/client/relancerabonnementarrete')}}" method="post">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id_abonnement" type="hidden" value="{{$article['id']}}">
                                                                    <input name="date_fin" type="hidden" value="<?=date('Y-m-d', strtotime('+1 year'));?>">


                                                                    <h2>{{$pub['titre']}}</h2>
                                                                    <img width="210px" height="100px" class="img-responsive img-centered" src="{{$pub['photo_couverture']}}" alt="">
                                                                    <p class="text-muted">
                                                                        {{$pub['description']}}
                                                                    </p>
                                                                    <p>
                                                                        {{$pub['nombre_numero']}} magazines par an <br>
                                                                        {{$pub['prix_annuel']}}€ par an <br>
                                                                        {{--Debut abonnement : {{$article['date_debut']}}<br>--}}
                                                                        {{--Fin abonnement : {{$article['date_fin']}}--}}
                                                                    </p>

                                                                    <button type="submit" class="btn btn-warning glyphicon glyphicon-heart-empty"> Relancer l'abonnement</button>

                                                                </form><br>
                                                                {{--<form class="form" action="{{url('/client/suspendreabonnement')}}" method="post">--}}
                                                                    {{--{!! csrf_field() !!}--}}
                                                                    {{--<input name="id_abonnement" type="hidden" value="{{$article['id']}}">--}}
                                                                    {{--<button type="submit" class="btn btn-danger glyphicon glyphicon-ban-circle"> Suspendre abonnement</button>--}}
                                                                {{--</form>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
@endsection