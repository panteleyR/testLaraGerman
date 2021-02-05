<?php

namespace App\Http\Controllers;

use App\Models\Drawing;
use App\Models\User;
use Illuminate\Http\Request;

class DrawingController extends Controller
{
    public function index(Request $request)
    {
        $validateData = $request->validate([
            'userId' => 'filled||exists:users,id'
        ]);

        $users = User::all();
        $drawings = Drawing::with('user');
        if (isset($validateData['userId'])) {
            $drawings = $drawings->where('user_id', $validateData['userId']);
        }
        $drawings = $drawings->paginate(20);

        return response()->view('welcome', [
            'users' => $users,
            'drawings' => $drawings
        ]);
    }
}
