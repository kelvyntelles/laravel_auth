<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::all();
        return response($tarefas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());

        return response()->json($tarefa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarefa = Tarefa::find($id);
        return response()->json($tarefa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarefa = Tarefa::find($id);
        $status = $tarefa->status;

        $status_atualizado;
        if($status == false) {
            $status_atualizado = true;
        } else {
            $status_atualizado = false;
        }

        $tarefa->status = $status_atualizado;
        $tarefa->update();

        return response()->json($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return response()->json(null, 204);
    }
}
