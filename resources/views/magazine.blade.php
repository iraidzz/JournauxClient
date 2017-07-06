@extends('layouts.template')
@section('content')

    <style>
        hr {
            height: 4px;
            margin-left: 15px;
            margin-bottom: -3px;
        }

        .hr-primary {
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .6), rgba(246, 205, 85, .6), rgba(52, 54, 86, 100));
        }
    </style>
    <h4 style="font-family: 'Courier New'; font-size: 25px"><i><center>Liste des magazines</center></i></h4>
    <form role="form" action="{{action('MagazineController@FiltreMagazine')}}" method="post">
        {!! csrf_field() !!}
            <div class="form-group col-lg-8">
                <input placeholder="Rechercher un magazine" name="titre" type="text" class="form-control">
                <input name="id" type="hidden" class="form-control"
                       value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">
            </div>
            <div class="form-group col-lg-3">
                <center>
                    <button type="submit" class="btn btn-warning">Rechercher</button>&nbsp;&nbsp;&nbsp;&nbsp;<a
                            href="/magazine/lister/{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}"
                            class="btn btn-info">Retour</a></center>
            </div>
    </form>
    @foreach($publications as $article)
        <hr class="hr-primary" style="margin-top: 0px;margin-left: 0px;"/>

        <!-- Portfolio Grid Section -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">{{$article['titre']}}</h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 portfolio-item">
                            <a href="#portfolioModal{{$article['id']}}" class="portfolio-link" data-toggle="modal">
                                <img width="210px" height="100px" src="{{$article['photo_couverture']}}"
                                     class="img-responsive img-centered" alt="">
                            </a>
                            <br>
                            <?php $contenu = ($article['description']);?>
                            <p class="text-muted"> @if(strlen($contenu)>50)
                                    <?php $contenu2 = substr($contenu, 0, 100)?>{{$contenu2}}...</p>
                            @else
                                {{$contenu}}
                            @endif

                            <div class="form-group col-xs-6">
                                <label>Parutions</label>
                                <a href="#portfolioModal{{$article['id']}}" class="btn btn-primary" data-toggle="modal">
                                    <i class="glyphicon glyphicon-list-alt"> {{$article['nombre_numero']}}</i>
                                </a>
                            </div>

                            <div class="form-group col-xs-6">
                                <label>Prix à l'année</label><br>
                                <a href="#portfolioModal{{$article['id']}}" class="btn btn-primary" data-toggle="modal">
                                    <i class="glyphicon glyphicon-euro"> {{$article['prix_annuel']}}</i>
                                </a>
                            </div>

                            <div class="form-group col-xs-12">
                                <a href="#portfolioModal{{$article['id']}}" class="btn btn-primary" data-toggle="modal">
                                    <i class="glyphicon glyphicon-eye-open"> Détail</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal{{$article['id']}}" tabindex="-1" role="dialog"
             aria-hidden="true">
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
                                    <!-- Project Details Go Here -->
                                    <form class="form" action="{{url('/client/sabonner')}}" method="post">
                                        {!! csrf_field() !!}
                                        <input name="client_id" type="hidden"
                                               value="{{\Illuminate\Support\Facades\Cookie::get('CookieId')}}">
                                        <input name="publication_id" type="hidden" value="{{$article['id']}}">
                                        <input name="prix" type="hidden" value="{{$article['prix_annuel']}}">
                                        <input name="date_debut" type="hidden" value="<?=date("Y-m-d");?>">
                                        <input name="date_fin" type="hidden"
                                               value="<?=date('Y-m-d', strtotime('+1 year'));?>">
                                        <input name="date_pause" type="hidden" value="0000-00-00">
                                        <input name="etat" type="hidden" value="1">

                                        <h3><u>{{$article['titre']}}</u></h3>
                                        <img width="210px" height="100px" class="img-responsive img-centered"
                                             src="{{$article['photo_couverture']}}" alt="">
                                        <p class="text-muted"> {{$article['description']}} </p>
                                        <p>
                                        <div class="form-group col-xs-6">
                                            <b>Magazines /an</b> :<br>
                                            <input type="text" value="{{$article['nombre_numero']}}" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 60px;margin-top: 8px;">
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <b>Prix /an</b> :<br>
                                            <input type="text" value="{{$article['prix_annuel']}}€" disabled style="text-align: center; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;width: 60px;margin-top: 8px;">
                                        </div>
                                        </p>

                                        {{--<button type="submit" class="btn btn-primary">S'abonner</button>--}}


                                        {{--Si utilisateur déjà abonné au magazine , on va griser le bouton d'abonnement--}}
                                        <?php $flag = 0; ?>
                                        @foreach($mesabonnements as $check)
                                            @if($check['publication_id'] == $article['id'])
                                                <?php $flag = 1; ?>
                                            @endif
                                        @endforeach
                                        @if($flag==1)
                                            <button type="submit" disabled class="btn btn-primary">Déjà abonné</button>
                                        @else
                                            <button type="submit" class="btn btn-primary">S'abonner</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection