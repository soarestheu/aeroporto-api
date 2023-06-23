<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVooRequest;
use App\Http\Requests\UpdateVooRequest;
use App\Models\Voo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Voo::with(['aeroportoOrigem', 'aeroportoDestino', 'classes']);

        if($request->filled('numero')) {
            $query->comNumero($request->numero);
        }

        if($request->filled('cd_aeroporto_origem')) {
            $query->comAeroportoOrigem($request->cd_aeroporto_origem);
        }

        if($request->filled('cd_aeroporto_destino')) {
            $query->comAeroportoDestino($request->cd_aeroporto_destino);
        }

        if($request->filled('data_partida')) {
            $query->comDataPartida($request->data_partida);
        }

        if($request->filled('hora_partida')) {
            $query->comHoraPartida($request->hora_partida);
        }

        if ($request->filled('limit')) {
            $data = $request->limit == '-1' ? $query->get() : $query->paginate($request->limit);
        } else {
            $data = $query->paginate(config('app.pageLimit'));
        }

        return response()->json($data);
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
