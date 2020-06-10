@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="pb-1">Benvingut, <b>{{ Auth::user()->name }}</b>.</p>

                    <div class="text-center">
                        <button class="btn btn-danger" onclick="window.location='{{ route("canals") }}'">Editar canals</button>
                        <button class="btn btn-success" class="pr-1 pl-1" onclick="window.location='{{ route("graelles") }}'">Editar graelles</button>
                        <button class="btn btn-primary" onclick="window.location='{{ route("programes") }}'">Editar programes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
