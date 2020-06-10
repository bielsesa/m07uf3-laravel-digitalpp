<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramesController extends Controller
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
        $programes = DB::table('programes')->get();

        return view('programes', ['programes' => $programes]);
    }
    
    /**
     * Crear un nou programa
     */
    public function store(Request $request)
    {
        DB::insert('insert into programes (nom_programa, descripcio, tipus, classificacio, graella_id) values (?,?,?,?,?)', 
            [$request['nom_programa'], $request['descripcio'], $request['tipus'], $request['classificacio'], $request['graella_id']]);
        return redirect('/programes');
    }

    /**
     * Actualitza les dades d'un programa
     */
    public function update(Request $request) {
        DB::update('update programes set nom_programa = ? where id = ?', [$request['nom_programa'], $request['id']]);
        DB::update('update programes set descripcio = ? where id = ?', [$request['descripcio'], $request['id']]);
        DB::update('update programes set tipus = ? where id = ?', [$request['tipus'], $request['id']]);
        DB::update('update programes set classificacio = ? where id = ?', [$request['classificacio'], $request['id']]);
        DB::update('update programes set graella_id = ? where id = ?', [$request['graella_id'], $request['id']]);
        return redirect('/programes');
    }

    /**
     * Esborrar un programa
     */
    public function destroy(Request $request) 
    {
        $query = "delete from programes where id = ".$request->id;
        DB::delete($query);
        return redirect('/programes');
    }
}
