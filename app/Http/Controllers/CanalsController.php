<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CanalsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna una col·lecció dels canals existents
     *
     * @return Response
     */
    public function index()
    {
        $canals = DB::table('canals')->pluck('nom_canal');

        // canviar view per això
        return view('canals', ['canals' => $canals]);
    }

    /**
     * Crear un nou canal
     */
    public function store(Request $request)
    {
        DB::insert('insert into canals (nom_canal) values (?)', [$request['nom_canal']]);
        return redirect('/canals');
    }

    /**
     * Actualitza el nom d'un canal
     */
    public function update(Request $request) {
        DB::update('update canals set nom_canal = ? where nom_canal = ?', [$request['nom_canal'], $request['nom_canal']]);
        return redirect('/canals');
    }

    /**
     * Esborrar un canal
     */
    public function destroy(Request $request) 
    {
        $query = "delete from canals where id = ".$request->id;
        DB::delete($query);
        return redirect('/canals');
    }

}
