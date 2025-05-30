<?php
namespace App\Http\Controllers;

use App\Models\Cripto;
use Illuminate\Http\Request;

class CriptoController extends Controller
{
    public function index()
    {
        return Cripto::with('monedas')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'symbol' => 'required|string|max:10',
            'monedas' => 'array', // opcional, ids
            'monedas.*' => 'integer|exists:moneda,id_moneda',
        ]);

        $cripto = Cripto::create([
            'nombre' => $data['nombre'],
            'symbol' => $data['symbol'],
        ]);

        if (!empty($data['monedas'])) {
            $cripto->monedas()->sync($data['monedas']);
        }

        return response()->json($cripto->load('monedas'), 201);
    }

    public function show($id)
    {
        return Cripto::with('monedas')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cripto = Cripto::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'symbol' => 'required|string|max:10',
            'monedas' => 'array',
            'monedas.*' => 'integer|exists:moneda,id_moneda',
        ]);

        $cripto->update([
            'nombre' => $data['nombre'],
            'symbol' => $data['symbol'],
        ]);

        if (isset($data['monedas'])) {
            $cripto->monedas()->sync($data['monedas']);
        }

        return response()->json($cripto->load('monedas'));
    }

    public function destroy($id)
    {
        $cripto = Cripto::findOrFail($id);
        $cripto->delete();
        return response()->json(null, 204);
    }
}
