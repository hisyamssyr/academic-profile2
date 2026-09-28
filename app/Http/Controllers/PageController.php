<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        return view('home', ['darkMode' => $this->darkMode($request)]);
    }

    public function profilMahasiswa(Request $request)
    {
        return view('profil-mahasiswa', ['darkMode' => $this->darkMode($request)]);
    }

    public function ideAgent(Request $request)
    {
        return view('ide-agent', ['darkMode' => $this->darkMode($request)]);
    }

    public function beranda(Request $request)
    {
        return view('beranda', [
            'darkMode' => $this->darkMode($request),
            'user' => $request->query('user'),
        ]);
    }

    private function darkMode(Request $request): bool
    {
        return $request->query('mode') === 'dark';
    }
}
