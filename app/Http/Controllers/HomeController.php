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
                'walking' => 0,
            ];
        }

        if (!array_key_exists('coords', $preferences)) {
            $preferences['coords'] = \json_encode([
                'lat' => 59.933005,
                'lng' => 30.344047
            ]);
        }

        if (!array_key_exists('gender', $preferences)) {
            $preferences['gender'] = 'n';
        }

        if (!array_key_exists('lookingFor', $preferences)) {
            $preferences['lookingFor'] = 'a';
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
            'walking' => 'required|min:-100|max:100',
            'gender' => 'required',
            'lookingFor' => 'required'
        ]);


        $options = \json_encode([
            'cinema' => $request->input('cinema'),
            'food' => $request->input('food'),
            'walking' => $request->input('walking'),
            'coords' => $request->input('coords'),
            'gender' => $request->input('gender'),
            'lookingFor' => $request->input('lookingFor')
        ]);



        $user->options_json = $options;

        $user->save();

        session()->flash('message', json_encode(['type' => 'success', 'text' => 'Ваши предпочтения успешно изменены!']));

        return redirect()->route('home');
    }

    public function findPair()
    {
        $user = Auth::user();
        $userOptions = \json_decode($user->options_json);

        $allUsers = \App\User::all();
        $users = [];

        foreach ($allUsers as $u) {
            if ($u->id != $user->id) {
                $users[] = $u;
            }
        }

        // Находим максимум
        $table = [];
        foreach ($users as $u) {
            $uOptions = \json_decode($u->options_json);

            $diffCinema = diff($userOptions->cinema, $uOptions->cinema);
            $diffFood = diff($userOptions->food, $uOptions->food);
            $diffWalking = diff($userOptions->walking, $uOptions->walking);

            $table[] = [$u->id, $diffCinema, $diffFood, $diffWalking];
        }

        //                user id       max value
        $maxRow = [    $table[0][0],     $table[0][1]     ];
        foreach ($table as $row) {
            $r = [$row[1], $row[2], $row[3]];
            $maxValue = max($r);
            if ($maxValue > $maxRow[1]) {
                $maxRow = [$row[0], $maxValue];
            }
        }

        return \App\User::find($maxRow[0]);
    }

    public function invites()
    {
        $user = Auth::user();
        $invites = \App\Invite::where('to', $user->id)->get();
        return view('invites')->withInvites($invites);
    }

    public function invite(\App\Invite $invite)
    {
        $user = Auth::user();
        $options = \json_decode($user->options_json);
        $gender = $options->gender;
        $genderText = '???';


        if ($gender === 'm') $genderText = 'Мужской';
        if ($gender === 'f') $genderText = 'Женский';
        if ($gender === 'n') $genderText = 'Нет';

        return view('invite')
            ->withInvite($invite)
            ->withUser($user)
            ->withGenderText($genderText);
    }
}

function diff($i, $j) {

    $pi = 3.1415926;

    return 25 * ( (sin($pi*$i/200) + 1 ) * (sin($pi*$j/200) + 1 ) );
}
