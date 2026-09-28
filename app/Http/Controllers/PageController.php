<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(Request $request): View
    {
        return view('home', ['darkMode' => $this->darkMode($request)]);
    }

    public function profilMahasiswa(Request $request): View
    {
        return view('profil-mahasiswa', ['darkMode' => $this->darkMode($request)]);
    }

    public function ideAgent(Request $request): View|RedirectResponse
    {
        $darkMode = $this->darkMode($request);

        if (! $request->has('submit')) {
            return view('ide-agent', ['darkMode' => $darkMode]);
        }

        $validator = Validator::make($request->query(), [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'ide' => ['required', 'string', 'max:2000'],
        ], [
            'nama.required' => 'Field Nama wajib diisi.',
            'nama.max' => 'Field Nama maksimal 255 karakter.',
            'email.required' => 'Field Email wajib diisi.',
            'email.email' => 'Field Email harus berupa alamat email yang valid.',
            'email.max' => 'Field Email maksimal 255 karakter.',
            'ide.required' => 'Field Ide / Feedback wajib diisi.',
            'ide.max' => 'Field Ide / Feedback maksimal 2000 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('ide-agent', $darkMode ? ['mode' => 'dark'] : [])
                ->withErrors($validator)
                ->withInput();
        }

        Log::info('Ide submission diterima', $validator->validated());

        return redirect()
            ->route('ide-agent', $darkMode ? ['mode' => 'dark'] : [])
            ->withInput([])
            ->with('status', 'Ide berhasil dikirim.');
    }

    public function beranda(Request $request): View
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
