<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $data = Matkul::All();
        return view('data.data_matkul.index', compact('data'));
    }

    public function addNew(Request $request)
    {
        $addmatkul = Matkul::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        $addmatkul->save();

        if ($addmatkul) {
            return redirect('/data-matkul')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Matkul::findOrFail($id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        if ($process) {
            return redirect('/data-matkul')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Matkul::findOrFail($id)->delete();
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
