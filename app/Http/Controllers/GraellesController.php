<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraellesController extends Controller
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
        $graelles = DB::table('graelles')->get();

        return view('graelles', ['graelles' => $graelles]);
    }
    
    /**
     * Crear una nova graella
     */
    public function store(Request $request)
    {
        DB::insert('insert into graelles (hora, dia, canal_id) values (?,?,?)', [$request['hora'], $request['dia'], $request['canal_id']]);
        return redirect('/graelles');
    }

    /**
     * Actualitza les dades d'una graella
     */
    public function update(Request $request) {
        DB::update('update graelles set hora = ? where id = ?', [$request['hora'], $request['id']]);
        DB::update('update graelles set dia = ? where id = ?', [$request['dia'], $request['id']]);
        DB::update('update graelles set canal_id = ? where id = ?', [$request['canal_id'], $request['id']]);
        return redirect('/graelles');
    }

    /**
     * Esborrar una graella
     */
    public function destroy(Request $request) 
    {
        $query = "delete from graelles where id = ".$request->id;
        DB::delete($query);
        return redirect('/graelles');
    }
}
