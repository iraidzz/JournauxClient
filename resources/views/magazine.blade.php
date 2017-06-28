@extends('layouts.template')
@section('content')

    <style>
        hr {
            height: 4px;
            margin-left: 15px;
            margin-bottom:-3px;
        }
        .hr-primary{
            background-image: -webkit-linear-gradient(left, rgba(0,0,0,.6), rgba(246, 205, 85,.6), rgba(52,54,86,100));
        }
    </style>

    @foreach($publications as $article)
        <hr class="hr-primary" />

    <!-- Portfolio Grid Section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{$article['titre']}}</h2>

                <div class="row">
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="#portfolioModal{{$article['id']}}" class="portfolio-link" data-toggle="modal">
                            <img  width="210px" height="100px" src="{{$article['photo_couverture']}}" class="img-responsive img-centered" alt="">
                        </a>
                        <br>
                        <?php $contenu=($article['description']);?>
                        <p class="text-muted"> @if(strlen($contenu)>50)
                                <?php $contenu2=substr($contenu, 0, 100)?>{{$contenu2}}...</p>
                        @else
                            {{$contenu}}
                        @endif
                        <label>Nombre de parution annuel</label>
                        <input disabled value="{{$article['nombre_numero']}}"><br>
                        <label>Prix à l'année</label><br>
                        <input disabled value="{{$article['prix_annuel']}} €">
                        <br>
                        <a href="#portfolioModal{{$article['id']}}" class="portfolio-link" data-toggle="modal">
                        Détails
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal{{$article['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <h2>{{$article['titre']}}</h2>
                                <img width="210px" height="100px" class="img-responsive img-centered" src="{{$article['photo_couverture']}}" alt="">
                                <p class="text-muted"> {{$article['description']}} </p>
                                    <p>{{$article['nombre_numero']}} magazines par an <br>
                                        {{$article['prix_annuel']}}€ par an <br></p>

                                <a href="" class="btn btn-primary">

                                        <i class="fa fa-plus"> S'abonner</i>

                                </a>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"> Retour</i> </button>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

@endsection