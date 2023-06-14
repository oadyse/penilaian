<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::paginate(10);
        $kelas = Kelas::All();
        $dosen = Dosen::All();
        return view('data.data_siswa.index', compact('data', 'kelas', 'dosen'));
    }

    public function addNew(Request $request)
    {
        $addSiswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'id_kelas' => $request->id_kelas,
            'id_user' => Auth::user()->id,
            'pa' => $request->pa,
        ]);
        $addSiswa->save();

        if ($addSiswa) {
            return redirect('/data-siswa')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Siswa::findOrFail($id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'id_kelas' => $request->id_kelas,
            'id_user' => Auth::user()->id,
            'pa' => $request->pa,
        ]);
        if ($process) {
            return redirect('/data-siswa')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Siswa::findOrFail($id)->delete();
            if ($process) {
                return redirect()->back()->with("delete", "Poof! Your data has been deleted!");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
