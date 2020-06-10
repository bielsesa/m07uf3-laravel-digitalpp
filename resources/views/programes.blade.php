@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h3>Afegir programa</h3>
                        <form method="POST" action="{{ route('programes-afegir') }}" class="pt-2">
                        @csrf
                            <div class="form-group row">
                                <label for="nom_programa" class="col-md-4 col-form-label text-md-right">Nom del programa</label>
                                <div class="col-md-6">
                                    <input type="text" id="nom_programa" name="nom_programa" class="form-control" required>
                                </div>
                                <label for="descripcio" class="col-md-4 col-form-label text-md-right">Descripció</label>
                                <div class="col-md-6">
                                    <input type="text" id="descripcio" name="descripcio" class="form-control" required>
                                </div>
                                <label for="tipus" class="col-md-4 col-form-label text-md-right">Tipus</label>
                                <div class="col-md-6">
                                    <input type="text" id="tipus" name="tipus" class="form-control" required>
                                </div>
                                <label for="classificacio" class="col-md-4 col-form-label text-md-right">Classificació</label>
                                <div class="col-md-6">
                                    <input type="text" id="classificacio" name="classificacio" class="form-control" required>
                                </div>
                                <label for="graella_id" class="col-md-4 col-form-label text-md-right">ID Graella</label>
                                <div class="col-md-6">
                                    <input type="number" id="graella_id" name="graella_id" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Afegir
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="llista-programes" class="pt-3">
                        <h3>Llista de programes</h3>
                        <table class="table pt-1">
                        <thead>
                            <th>Nom</th>
                            <th>Descripció</th>
                            <th>Tipus</th>
                            <th>Classificació</th>
                            <th>ID Graella</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($programes as $programa) {
                                    echo "<tr style=\"border-bottom: 1px solid grey;\">
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$programa->nom_programa."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$programa->descripcio."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$programa->tipus."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$programa->classificacio."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$programa->graella_id."</td>
                                            <td class=\"pl-2 pb-2 pt-2\">
                                                <button class=\"btn btn-primary\">Editar</button>
                                                <button class=\"btn btn-danger\">Esborrar</button>
                                            </td></tr>";
                                }
                            ?>
                        </tbody>
                        </table>                    
                    </div>

                <button class="btn btn-danger" onclick="window.location='{{ route("home") }}'">Tornar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
