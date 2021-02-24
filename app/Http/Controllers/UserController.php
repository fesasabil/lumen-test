<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            $relations = explode(',', $request->with);
            $user = User::select('id', 'email', 'fullname', 'created_at', 'updated_at');
            foreach ($relations as $relation) {
                $user->with($relation);
            }
            $user = $user->get();
        } catch (RelationNotFoundException $exception) {
            return response()->json([
                'code'    => 404,
                'message' => 'Relation '.$exception->relation.' not found',
            ], 401);
        }

        return response()->json([
            'code'    => 200,
            'message' => 'Success',
            'data' => $user
        ], 200);
    }

    public function view(Request $request, string $user)
    {
        $users = User::select('id', 'email', 'fullname', 'created_at', 'updated_at')->findOrFail($user);

        return response()->json([
            'code'    => 200,
            'message' => 'Success',
            'data' => $users
        ], 200);
    }
}
