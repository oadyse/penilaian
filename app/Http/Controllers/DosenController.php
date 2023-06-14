<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Matkul;
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
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        $adddosen->save();

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
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
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
