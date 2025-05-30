<?php
namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    public function index()
    {
        return Moneda::with('criptomonedas')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'required|string|max:10|unique:moneda,codigo',
            'criptomonedas' => 'array', // opcional, ids
            'criptomonedas.*' => 'integer|exists:cripto,id_criptomoneda',
        ]);

        $moneda = Moneda::create([
            'nombre' => $data['nombre'],
            'codigo' => $data['codigo'],
        ]);

        if (!empty($data['criptomonedas'])) {
            $moneda->criptomonedas()->sync($data['criptomonedas']);
        }

        return response()->json($moneda->load('criptomonedas'), 201);
    }

    public function show($id)
    {
        return Moneda::with('criptomonedas')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $moneda = Moneda::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'required|string|max:10|unique:moneda,codigo,' . $moneda->id_moneda . ',id_moneda',
            'criptomonedas' => 'array',
            'criptomonedas.*' => 'integer|exists:cripto,id_criptomoneda',
        ]);

        $moneda->update([
            'nombre' => $data['nombre'],
            'codigo' => $data['codigo'],
        ]);

        if (isset($data['criptomonedas'])) {
            $moneda->criptomonedas()->sync($data['criptomonedas']);
        }

        return response()->json($moneda->load('criptomonedas'));
    }

    public function destroy($id)
    {
        $moneda = Moneda::findOrFail($id);
        $moneda->delete();
        return response()->json(null, 204);
    }
}
