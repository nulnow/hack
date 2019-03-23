<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showUpdatePreferencesForm(Request $request)
    {
        $user = Auth::user();

        $preferences = $user->options_json ? \json_decode($user->options_json, true) : false;

        if (!$preferences) {
            $preferences = [
                'cinema' => 0,
                'food' => 0,
                'walking' => 0
            ];
        }

        return view('updatePreferencesForm', [
            'user' => $user,
            'preferences' => $preferences
        ]);
    }

    public function updatePreferences(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'cinema' => 'required|min:-100|max:100',
            'food' => 'required|min:-100|max:100',
            'walking' => 'required|min:-100|max:100'
        ]);

        $options = \json_encode([
            'cinema' => $request->input('cinema'),
            'food' => $request->input('food'),
            'walking' => $request->input('walking')
        ]);

        $user->options_json = $options;

        $user->save();

        session()->flash('message', json_encode(['type' => 'success', 'text' => 'Ваши предпочтения успешно изменены!']));

        return redirect()->route('home');
    }
}
