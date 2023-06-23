<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVooRequest;
use App\Http\Requests\UpdateVooRequest;
use App\Models\Voo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVooRequest $request)
    {
        DB::beginTransaction();
        try {
            $dadosVoo = $request->only([
                'numero', 'cd_aeroporto_origem', 'cd_aeroporto_destino', 'data_partida', 'hora_partida'
            ]);

            $voo = Voo::create($dadosVoo);
            DB::commit();
            return response()->json(["Voo Cadastrado!"],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                "title" => "Erro inesperado",
                "message" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Voo $voo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voo $voo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVooRequest $request, Voo $voo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voo $voo)
    {
        //
    }
}
