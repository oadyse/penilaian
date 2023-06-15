<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Matkul;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        $data = Siswa::query()->paginate(10);
        $totalMatkul = Matkul::query()->count();
        return view('data.penilaian.index', compact('data','totalMatkul'));
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Penilaian::where('id', $id);
        if ($process->exists()) {
            $process->update([
                'nilai' => $request->input('nilai'),
                'index' => $request->input('index'),
            ]);
            return redirect()->back()->with("successUpdate", "Data updated successfully");
        } else {
            $add = Penilaian::create([
                'id_siswa' => $request->input('id_siswa'),
                'id_matkul' => $request->input('id_matkul'),
                'nilai' => $request->input('nilai'),
                'index' => $request->input('index'),
            ]);
            if ($add) {
                return redirect()->back()->with("successUpdate", "Data updated successfully");
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        }
    }

    public function detail(Request $request, $id)
    {
        $id = base64_decode($id);
        $data = Penilaian::where(['id_siswa'=>$id])->first();
        $siswa = Siswa::where(['id'=>$id])->first();
        $matkul = Matkul::all();
        return view('data.penilaian.nilai', compact('data', 'siswa', 'matkul'));
    }

    public function hasil()
    {
        $data = Penilaian::where(['id_siswa'=>Auth::user()->siswa->id])->first();
        $siswa = Siswa::where(['id'=>Auth::user()->siswa->id])->first();
        $matkul = Matkul::all();
        return view('data.penilaian.nilai', compact('data', 'siswa', 'matkul'));
    }
}
