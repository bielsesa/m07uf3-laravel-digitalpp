@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Canals</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h3>Afegir canal</h3>
                        <form method="POST" action="{{ route('canals-afegir') }}" class="pt-2">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom del canal</label>
                                <div class="col-md-6">
                                    <input type="text" id="nom_canal" name="nom_canal" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Afegir
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="llista-canals" class="pt-3">
                        <h3>Llista de canals</h3>
                        <table class="pt-1">
                        <?php
                            foreach ($canals as $canal) {
                                echo "<tr style=\"border-bottom: 1px solid grey;\"><td class=\"pr-3 pb-2 pt-2\" 
                                style=\"border-right: 1px dotted grey;\">".$canal."</td><td class=\"pl-2 pb-2 pt-2\"><button class=\"btn btn-primary\">Editar</button>
                                <button class=\"btn btn-danger\">Esborrar</button></td></tr>";
                            }
                        ?>
                        </table>                    
                    </div>

                    <button class="btn btn-danger" onclick="window.location='{{ route("home") }}'">Tornar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
