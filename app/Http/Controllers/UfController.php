<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Uf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UfController
 * @package App\Http\Controllers
 */
class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ufs = Uf::paginate();

        return view('uf.index', compact('ufs'))
            ->with('i', (request()->input('page', 1) - 1) * $ufs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uf = new Uf();
        return view('uf.create', compact('uf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Uf::$rules);

        $uf = Uf::create($request->all());

        return redirect()->route('ufs.index')
            ->with('success', 'Uf created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uf = Uf::find($id);

        return view('uf.show', compact('uf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uf = Uf::find($id);

        return view('uf.edit', compact('uf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Uf $uf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uf $uf)
    {
        request()->validate(Uf::$rules);

        $uf->update($request->all());

        return redirect()->route('ufs.index')
            ->with('success', 'Uf updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $uf = Uf::find($id)->delete();

        return redirect()->route('ufs.index')
            ->with('success', 'Uf deleted successfully');
    }
    public function importData()
    {
        try {
            $json = file_get_contents(storage_path('response1.json'));
            $data = json_decode($json, true);
            foreach ($data as $item) {
                DB::table('ufs')->insert(
                    array(
                        "nombreIndicador" =>   $item['nombreIndicador'],
                        "codigoIndicador" =>   $item['codigoIndicador'],
                        "unidadMedidaIndicador" =>   $item['unidadMedidaIndicador'],
                        "valorIndicador" =>   $item['valorIndicador'],
                        "fechaIndicador" =>   $item['fechaIndicador'],
                    )
                );
            }
            return response()->json("Ingresado correctamente", 200);
        } catch (\Throwable $th) {
            return response()->json("error", 500);
        }
    }
    public function GetUfsJson(Request $request)
    {
        try {
            Log::info($request);
            $data=Uf::where("nombreIndicador",'UNIDAD DE FOMENTO (UF)')
            ->whereBetween('fechaIndicador', [$request->desde, $request->hasta])
            ->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json("error", 500);
        }
    }
}
