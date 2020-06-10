@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Graelles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <h3>Afegir graella</h3>
                        <form method="POST" action="{{ route('graelles-afegir') }}" class="pt-2">
                        @csrf
                            <div class="form-group row">
                                <label for="hora" class="col-md-4 col-form-label text-md-right">Hora de la graella</label>
                                <div class="col-md-6">
                                    <input type="time" id="hora" name="hora" class="form-control" required>
                                </div>
                                <label for="dia" class="col-md-4 col-form-label text-md-right">Dia</label>
                                <div class="col-md-6">
                                    <input type="text" id="dia" name="dia" class="form-control" required>
                                </div>
                                <label for="canal_id" class="col-md-4 col-form-label text-md-right">ID del canal</label>
                                <div class="col-md-6">
                                    <input type="number" id="canal_id" name="canal_id" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Afegir
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="llista-graelles" class="pt-3">
                        <h3>Llista de graelles</h3>
                        <table class="table pt-1">
                        <thead>
                            <th>Hora</th>
                            <th>Dia</th>
                            <th>ID Canal</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($graelles as $graella) {
                                    echo "<tr style=\"border-bottom: 1px solid grey;\">
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$graella->hora."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$graella->dia."</td>
                                            <td class=\"pr-3 pb-2 pt-2\" style=\"border-right: 1px dotted grey;\">".$graella->canal_id."</td>
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
