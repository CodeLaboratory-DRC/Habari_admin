<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $user = User::create([
            'name' => 'admin',
            'phone' => '0974944870',
            'role' => 'admin',
            'password' => Hash::make('admin243'),
        ]);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('phone', $request->phone)->first();

        $remember = $request->has('remember') ? true : false;
        $credential = ['phone' => $request->phone, 'password' => $request->password];


        if (Auth::attempt($credential, $remember)) {
            $request->session()->regenerate();
            return $this->verifyAuthorization();
        }

        return redirect()->back()->withInput($request->only('phone'))->with('error', 'mot de passe ou numéro de téléphone incorrect');
    }

    /*public function profil()
    {
        $profil = Account::select(
            'accounts.id',
            'users.phone',
            'accounts.email',
            'accounts.name',
            'accounts.gender',
            'accounts.address'
        )
            ->join('users', 'users.id', 'accounts.user_id')
            ->where('user_id', auth()->user()->id)->first();

        return view('auth.profil', compact('profil'));
    }*/

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function verifyAuthorization()
    {
        if (auth()->user()->role == 'user') {
            Auth::logout();
            return redirect('/login')->withError('Vous n\'avez pas l\'acces necessaire pour acceder à cette ressource');
        }

        return redirect('/');
    }

}
