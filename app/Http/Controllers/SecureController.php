<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SecureController extends Controller
{
	public function profile(Request $request)
	{
		$user = User::select('id', 'email', 'fullname', 'created_at', 'updated_at')->get();

        return response()->json([
            'code'    => 200,
            'message' => 'Success',
            'data' => $user
        ], 200);
	}
}