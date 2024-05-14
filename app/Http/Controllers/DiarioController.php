<?php

namespace App\Http\Controllers;

use App\Models\Diario;
use App\Http\Requests\DiarioRequest;

/**
 * Class DiarioController
 * @package App\Http\Controllers
 */
class DiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diarios = Diario::paginate();

        return view('diarios.index', compact('diarios'))
            ->with('i', (request()->input('page', 1) - 1) * $diarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diario = new Diario();
        return view('diarios.create', compact('diario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiarioRequest $request)
    {
        Diario::create($request->validated());

        return redirect()->route('diarios.index')
            ->with('success', 'Diario created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $diario = Diario::find($id);

        return view('diarios.show', compact('diario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $diario = Diario::find($id);

        return view('diarios.edit', compact('diario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiarioRequest $request, Diario $diario)
    {
        $diario->update($request->validated());

        return redirect()->route('diarios.index')
            ->with('success', 'Diario updated successfully');
    }

    public function destroy($id)
    {
        Diario::find($id)->delete();

        return redirect()->route('diarios.index')
            ->with('success', 'Diario deleted successfully');
    }
}
