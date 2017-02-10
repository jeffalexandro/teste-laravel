<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Carrega a view com todos os estados listados
        return view('estados.index')
            ->with('estados', Estado::all())
            ->with('page', 'Lista de Estados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estados.create')->with('page', 'Cadastrar Estado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'sigla'      => 'required',
        );
        $validator = Validator($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('estados/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $estado = new Estado;
            $estado->nome       = $request->get('nome');
            $estado->sigla      = $request->get('sigla');           
            $estado->save();

            // redirect
            $request->session()->flash('message', 'Estado criado com sucesso!');
            return redirect('estados');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {

        // show the view and pass the estado to it
        return view('estados.show')
            ->with('estado', $estado)
            ->with('page', 'Detalhes Estado');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estados.edit')
            ->with('estado', $estado)
            ->with('page', 'Editar Estado');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'sigla'      => 'required',
        );
        $validator = Validator($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect('estados/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store            
            $estado->nome       = $request->get('nome');
            $estado->sigla      = $request->get('sigla');
            $estado->save();

            // redirect
            $request->session()->flash('message', 'Estado atualizado com sucesso!');
            return Redirect('estados');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Estado $estado)
    {
        $estado->delete();

        // redirect
        $request->session()->flash('message', 'Estado deletado com sucesso!');
        return Redirect('estados');
    }
}
