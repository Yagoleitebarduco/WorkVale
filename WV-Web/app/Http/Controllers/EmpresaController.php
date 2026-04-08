<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todas as empresas ativas ordenadas pela mais recente
        $empresas = Empresa::where('ativo', true)->orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $empresas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'razao_social' => 'required|string|max:255',
            'cnpj_cpf' => 'required|string|max:18|unique:empresas,cnpj_cpf',
            'email_corporativo' => 'required|email|unique:empresas,email_corporativo',
            'senha' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Cria a empresa (O Model vai cuidar de criptografar a senha e formatar CNPJ)
            $empresa = Empresa::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Empresa cadastrada com sucesso!',
                'data' => $empresa
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar empresa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json([
                'success' => false,
                'message' => 'Empresa não encontrada.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $empresa
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'razao_social' => 'sometimes|string|max:255',
            'email_corporativo' => 'sometimes|email|unique:empresas,email_corporativo,' . $empresa->id,
            'senha' => 'sometimes|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $empresa->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Empresa atualizada com sucesso!',
            'data' => $empresa
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        // Soft Delete (apenas marca como inativo/deletado, não apaga do DB)
        $empresa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Empresa removida com sucesso.'
        ], 200);
    }
}