<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Matkul;
use App\Models\Mengajar;
use App\Models\Pengampu;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $data = Dosen::All();
        $kelas = Kelas::All();
        $matkul = Matkul::All();
        return view('data.data_dosen.index', compact('data', 'kelas', 'matkul'));
    }

    public function addNew(Request $request)
    {
        $adddosen = Dosen::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'gender' => $request->gender,
        ]);
        $adddosen->save();
        foreach($request->input('matkul') as $matkul) {
            Mengajar::create([
                'id_dosen' => $adddosen->id,
                'id_matkul' => $matkul
            ]);
        }
        foreach($request->input('kelas') as $kelas) {
            Pengampu::create([
                'id_dosen' => $adddosen->id,
                'id_kelas' => $kelas
            ]);
        }

        if ($adddosen) {
            return redirect('/data-dosen')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Dosen::findOrFail($id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'gender' => $request->gender,
        ]);
        Mengajar::where('id_dosen',$id)->delete();
        foreach($request->input('matkul') as $matkul) {
            Mengajar::create([
                'id_dosen' => $id,
                'id_matkul' => $matkul
            ]);
        }
        Pengampu::where('id_dosen',$id)->delete();
        foreach($request->input('kelas') as $kelas) {
            Pengampu::create([
                'id_dosen' => $id,
                'id_kelas' => $kelas
            ]);
        }
        if ($process) {
            return redirect('/data-dosen')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Dosen::findOrFail($id)->delete();
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
