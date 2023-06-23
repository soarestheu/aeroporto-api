<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAeroportoRequest;
use App\Http\Requests\UpdateAeroportoRequest;
use App\Models\Aeroporto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AeroportoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Aeroporto::with('cidade');

        if($request->filled('nome')) {
            $query->comNome($request->nome);
        }

        if($request->filled('codigo_iata')) {
            $query->comCodigoIata($request->codigo_iata);
        }

        if($request->filled('cd_cidade')) {
            $query->comCidade($request->cd_cidade);
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
    public function store(StoreAeroportoRequest $request)
    {
        DB::beginTransaction();
        try {
            $dadosAeroporto = $request->only([
                'nome', 'codigo_iata', 'cd_cidade'
            ]);

            $aeroporto = Aeroporto::create($dadosAeroporto);
            DB::commit();
            return response()->json(["Aeroporto Cadastrado!"],200);
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
    public function show(Aeroporto $aeroporto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aeroporto $aeroporto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAeroportoRequest $request, Aeroporto $aeroporto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aeroporto $aeroporto)
    {
        //
    }
}
