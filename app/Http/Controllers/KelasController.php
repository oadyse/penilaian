<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::All();
        return view('data.data_kelas.index', compact('data'));
    }

    public function addNew(Request $request)
    {
        $addkelas = Kelas::create([
            'semester' => $request->semester,
            'kelas' => $request->kelas,
            'tahun' => $request->tahun,
        ]);
        $addkelas->save();

        if ($addkelas) {
            return redirect('/data-kelas')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Kelas::findOrFail($id)->update([
            'semester' => $request->semester,
            'kelas' => $request->kelas,
            'tahun' => $request->tahun,
        ]);
        if ($process) {
            return redirect('/data-kelas')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Kelas::findOrFail($id)->delete();
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
