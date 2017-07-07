@extends('layouts.template')
@section('content')
    <style>
        hr {
            height: 4px;
            margin-bottom: -3px;
        }

        .hr-primary {
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .6), rgba(246, 205, 85, .6), rgba(52, 54, 86, 100));
        }

        .hr-input {
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.3), rgba(255, 190, 0, .5), rgba(0, 0, 0, 0.3));
        }

        .text-jaunefonce {
            color: #000000;
        }
    </style>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>--}}
    {{--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">--}}
    {{--<script>--}}

    {{--@if(Session::has('success'))--}}
    {{--toastr.success("{{ Session::get('success') }}");--}}
    {{--@endif--}}

    {{--@if(Session::has('info'))--}}
    {{--toastr.info("{{ Session::get('info') }}");--}}
    {{--@endif--}}

    {{--@if(Session::has('warning'))--}}
    {{--toastr.warning("{{ Session::get('warning') }}");--}}
    {{--@endif--}}

    {{--@if(Session::has('error'))--}}
    {{--toastr.error("{{ Session::get('error') }}");--}}
    {{--@endif--}}

    {{--</script>--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="row">
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <h4 style="font-family: 'Courier New'; font-size: 25px"><i>Vos abonnements en cours</i></h4>
                        @if($mesabonnements==null)  {{--Il n'y a riens à afficher--}}
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 portfolio-item">
                                            <h3><i>Oups... <br>Vous n'avez pour le moment aucun abonnement en cour. Nous
                                                    vous invitons à vous redirigez vers la liste des magazines. </i><br><br><u><a
{{--                                                            href="/magazine/lister/{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">C'est--}}
                                                            href="{{url('/magazine/lister/'.\Illuminate\Support\Facades\Cookie::get('CookieId'))}}">C'est
                                                        par ici!</a></u></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else {{--Il y a du contenu à afficher--}}

                        @foreach($mesabonnements as $article)
                        <!-- Portfolio Grid Section -->



                            @foreach($publications as $pub)
                                @if($pub['id']==$article['publication_id'])
                                <!-- Portfolio Grid Section -->
                                    <div class="row">
                                        <hr class="hr-primary" style="margin-top: 0px;"/>
                                        <div class="col-lg-12 text-center">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item">
                                                    <div class="form-group col-xs-5">
                                                        <a href="#portfolioModal{{$pub['id']}}" class="portfolio-link"
                                                           data-toggle="modal"><BR>
                                                            <img width="80px" height="80px"
                                                                 src="{{$pub['photo_couverture']}}"
                                                                 class="img-responsive img-centered" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="form-group col-xs-7">
                                                        <BR><label>Nom</label>
                                                        <input type="text" class="hr-input text-jaunefonce"
                                                               style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;width: 164px;"
                                                               disabled value="{{$pub['titre']}}">
                                                        <label>Fin abonnement</label><br>
                                                        <input type="text" class="hr-input text-jaunefonce"
                                                               style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;width: 164px;"
                                                               disabled value="<?=date_format(date_create($article['date_fin']), 'd/m/Y');?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-xs-12">
                                                    <a href="#portfolioModal{{$pub['id']}}" class="btn btn-primary"
                                                       data-toggle="modal">
                                                        <i> Détail</i>
                                                    </a>
                                                    <?php
                                                    // On calcule depuis combien de temps l'abonnement est actif . S'il se termine dans les deux mois à venir , on active un bonton "Abonnement bientot terminé"
                                                    $datetime1 = date_create($article['date_fin']);
                                                    $datetime2 = date_create(date("Y-m-d"));
                                                    $interval = date_diff($datetime2, $datetime1);
                                                    if($interval->days < 60) // 60 jours
                                                    {
                                                    ?>
                                                    <br><br>
                                                    <a href="#portfolioModal{{$pub['id']}}"
                                                       class="glyphicon glyphicon-warning-sign btn btn-danger"
                                                       data-toggle="modal">
                                                        <i> Abonnement bientôt terminé</i>
                                                    </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portfolio-modal modal fade" id="portfolioModal{{$pub['id']}}"
                                         tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                <form class="form"
                                                                      action="{{url('/client/renouvelerabonnement')}}"
                                                                      method="post">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id_abonnement" type="hidden"
                                                                           value="{{$article['id']}}">
                                                                    <input name="date_fin" type="hidden"
                                                                           value="{{$article['date_fin']}}">
                                                                    <input name="client_id" type="hidden"
                                                                           value="{{$article['client_id']}}">
                                                                    <input name="paye" type="hidden"
                                                                           value="{{$article['paye']}}">
                                                                    <input name="prix_magazine_annuel" type="hidden"
                                                                           value="{{$pub['prix_annuel']}}">
                                                                    <input name="cout_abonnement" type="hidden"
                                                                           value="{{$article['prix']}}">


                                                                    <h3><u>{{$pub['titre']}}</u></h3>
                                                                    <img width="210px" height="100px"
                                                                         class="img-responsive img-centered"
                                                                         src="{{$pub['photo_couverture']}}" alt="">
                                                                    <p class="text-muted">
                                                                        {{$pub['description']}}
                                                                    </p>
                                                                    <p>
                                                                    <div class="form-group col-xs-6">
                                                                        <b>Magazines /an</b> :<br>
                                                                        <input type="text" value="{{$pub['nombre_numero']}}" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 60px;margin-top: 8px;">
                                                                    </div>

                                                                    <div class="form-group col-xs-6">
                                                                        <b>Prix /an</b> :<br>
                                                                        <input type="text" value="{{$pub['prix_annuel']}}€" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 60px;margin-top: 8px;">
                                                                    </div>


                                                                    <div class="form-group col-xs-6">
                                                                        <b>Debut abo. </b> :<br>
                                                                        <input type="text" value="<?=date_format(date_create($article['date_debut']), 'd/m/Y');?>" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 100px;margin-top: 8px;">
                                                                    </div>

                                                                    <div class="form-group col-xs-6">
                                                                        <b>Fin abo.</b> :<br>
                                                                        <input type="text" value="<?=date_format(date_create($article['date_fin']), 'd/m/Y');?>" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 100px;margin-top: 8px;">
                                                                    </div>
                                                                    </p><br>

                                                                    <div class="form-group col-xs-12">
                                                                        @if($article['paye']==0)
{{--                                                                            <a href="/client/panier/{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}" class="btn btn-warning glyphicon glyphicon-euro">--}}
                                                                            <a href="{{url('/client/panier/'.\Illuminate\Support\Facades\Cookie::get('CookieId'))}}" class="btn btn-warning glyphicon glyphicon-euro">
                                                                                A régler
                                                                            </a>
                                                                        @else
                                                                            <a href="" class="btn btn-warning glyphicon glyphicon-euro disabled">
                                                                                Déjà réglé
                                                                            </a>
                                                                        @endif
                                                                    </div>

                                                                    <br><br>
                                                                    <button type="submit"
                                                                            class="btn btn-success glyphicon glyphicon-heart-empty">
                                                                        Renouveler abonnement <br>(1 année)
                                                                    </button>

                                                                </form>
                                                                <br>
                                                                <form class="form"
                                                                      action="{{url('/client/suspendreabonnement')}}"
                                                                      method="post">
                                                                    {!! csrf_field() !!}
                                                                    <input name="id_abonnement" type="hidden"
                                                                           value="{{$article['id']}}">
                                                                    <input name="client_id" type="hidden"
                                                                           value="{{$article['client_id']}}">
                                                                    <button type="submit"
                                                                            class="btn btn-danger glyphicon glyphicon-ban-circle">
                                                                        Suspendre abonnement
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--@foreach($publications as $article)--}}
    {{--<!-- Portfolio Grid Section -->--}}
    {{--<div class="container" >--}}
    {{--<div class="row" >--}}
    {{--<hr class="hr-primary" style="margin-top: 0px;" />--}}
    {{--<div class="col-lg-12 text-center">--}}
    {{--<div class="row" style="background-color: rgba(255,0,0,0.25)">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-6 col-xs-12 portfolio-item">--}}
    {{--<div class="form-group col-xs-5">--}}
    {{--<a href="#portfolioModal{{$article['id']}}" class="portfolio-link" data-toggle="modal"><BR>--}}
    {{--<img width="80px" height="80px" src="{{$article['photo_couverture']}}" class="img-responsive img-centered" alt="">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="form-group col-xs-7">--}}
    {{--<BR><label>Nom</label>--}}
    {{--<input type="text" class="hr-input text-jaunefonce" style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;" disabled value="{{$article['titre']}}">--}}
    {{--<label>Fin abonnement</label><br>--}}
    {{--<input type="text" class="hr-input text-jaunefonce" style="text-align: center; -webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;" disabled value="10/12/2017">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group col-xs-12">--}}
    {{--<a href="#portfolioModal{{$article['id']}}" class="btn btn-primary" data-toggle="modal">--}}
    {{--<i> Détail</i>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="portfolio-modal modal fade" id="portfolioModal{{$article['id']}}" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="close-modal" data-dismiss="modal">--}}
    {{--<div class="lr">--}}
    {{--<div class="rl">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-8 col-lg-offset-2">--}}
    {{--<div class="modal-body">--}}
    {{--<h2>{{$article['titre']}}</h2>--}}
    {{--<img width="210px" height="100px" class="img-responsive img-centered" src="{{$article['photo_couverture']}}" alt="">--}}
    {{--<p class="text-muted">--}}
    {{--{{$article['description']}}--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--{{$article['nombre_numero']}} magazines par an <br>--}}
    {{--{{$article['prix_annuel']}}€ par an <br>--}}
    {{--</p>--}}

    {{--<a href="" class="btn btn-primary">--}}
    {{--<i class="glyphicon glyphicon-heart"> Renouveler abonnement <br>(1 année)</i>--}}
    {{--</a><br><br>--}}
    {{--<a href="" class="btn btn-danger">--}}
    {{--<i class="glyphicon glyphicon-ban-circle"> Suspendre abonnement</i>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
@endsection