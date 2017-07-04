@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b><i><u>Enregistrement</u></i></b></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('/client/ajouter')}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Genre</label>
                                <div class="col-md-6">
                                    <select name="civilite" type="text" class="form-control">
                                        <option value="MR" selected>MR</option>
                                        <option value="MME">MME</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Prenom</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="prenom" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Numéro de téléphone</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="numero_telephone" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date de naissance</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="date_naissance" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Lieu de naissance</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lieu_naissance" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Adresse de domicile</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="adresse_domicile" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Code postal</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="postal_domicile" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Ville</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="ville_domicile" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Je m'inscrit !
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection