<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;  
use App\Services\AuthService;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

  
    public function register(Request $request): JsonResponse
    {
        // 1) Validación
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        try {
            // 2) Inicio de transacción
            DB::beginTransaction();

            // 3) Creo el usuario
            $user = User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            // 4) Genero el token (ahora que User implementa JWTSubject)
            $token = JWTAuth::fromUser($user);

            // 5) Commit: si todo salió bien, persisto
            DB::commit();

            // 6) Devuelvo respuesta exitosa
            return response()->json([
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth('api')->factory()->getTTL() * 60,
            ], 201);

        } catch (\Throwable $e) {
            // 7) Rollback: si algo falla, deshago INSERT
            DB::rollBack();

            return response()->json([
                'error' => 'No se pudo completar el registro',
                'msg'   => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $token = $this->authService->login($data);

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
