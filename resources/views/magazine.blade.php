@extends('layouts.template')
@section('content')

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">


                    @foreach (json_decode($publication) as $article)

                    {{--@foreach($publication as $article)--}}
                        <hr class="hr-primary" /><br><br>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group col-lg-12">
                                    <label>Titre publication</label>
                                    <input name="titre" type="text" disabled value="{{$article->titre}}" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label>Texte publication</label>
                                    <textarea name="description" class="form-control" disabled rows="6">{{$article->description}}</textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Prix à l'année</label>
                                    <input name="prix_annuel" type="text" disabled value="{{$article->prix_annuel}} €" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nombre de parutions à l'année</label>
                                    <input name="nombre_numero" type="text" disabled value="{{$article->nombre_numero}} Numéros" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <center><a href="/publication/{{$article->id}}" class="btn btn-primary">Editer le publication</a></center>
                                </div>
                            </div>
                            <div class="col-lg-4"><br><br>
                                <img width="210px" height="100px" class="img-responsive img-border img-full" src="{{$article->photo_couverture}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>

@endsection