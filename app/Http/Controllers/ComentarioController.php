<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Http\Requests\ComentarioRequest;

/**
 * Class ComentarioController
 * @package App\Http\Controllers
 */
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = Comentario::paginate();

        return view('comentarios.index', compact('comentarios'))
            ->with('i', (request()->input('page', 1) - 1) * $comentarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comentario = new Comentario();
        return view('comentarios.create', compact('comentario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComentarioRequest $request)
    {
        Comentario::create($request->validated());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);

        return view('comentarios.show', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);

        return view('comentarios.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComentarioRequest $request, Comentario $comentario)
    {
        $comentario->update($request->validated());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario updated successfully');
    }

    public function destroy($id)
    {
        Comentario::find($id)->delete();

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario deleted successfully');
    }
}
