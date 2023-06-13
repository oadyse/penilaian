<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Siswa;
use App\Models\Answer;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $data = Soal::All();
        // $soal = Soal::where('kreator', Auth()->user()->id)->exists();
        return view('data.soal.index', compact('data'));
    }

    public function form()
    {
        $data = Soal::All();
        return view('data.soal.create', compact('data'));
    }

    public function preview($id)
    {
        $id = base64_decode($id);
        $data = Soal::where('id', $id)->first();
        return view('data.soal.preview', compact('data'));
    }

    public function addNew(Request $request)
    {
        $add = Soal::create([
            'judul' => $request->judul,
            'soal' => $request->soal,
            'kreator' => Auth()->user()->id,
            'status' => 1,
        ]);
        $add->save();

        if ($add) {
            return redirect('/soal')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $data = Soal::where('id', $id)->first();
        return view('data.soal.edit', compact('data'));
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Soal::findOrFail($id)->update([
            'judul' => $request->judul,
            'soal' => $request->soal,
            'kreator' => Auth()->user()->id,
            'status' => $request->status,
        ]);
        if ($process) {
            return redirect('/soal')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process = Soal::findOrFail($id)->delete();
            if ($process) {
                return redirect()->back()->with("delete", "Poof! Your data has been deleted!");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function soal()
    {
        $soal = Soal::All();
        $siswa = Siswa::All();
        $answer = Answer::where('id_siswa', Auth()->user()->siswa->id)->exists();
        return view('data.soal.soal', compact('soal', 'siswa', 'answer'));
    }

    public function addAnswer(Request $request)
    {
        $add = Answer::create([
            'id_soal' => $request->id_soal,
            'id_siswa' => $request->id_siswa,
            'jawaban' => $request->jawaban,
        ]);
        $add->save();

        if ($add) {
            return redirect('/hal_soal')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function hasil()
    {
        $soal = Soal::All();
        $siswa = Siswa::All();
        $answer = Answer::where('id_siswa', Auth()->user()->siswa->id)->first();
        $exists = Penilaian::where('id_siswa', Auth()->user()->siswa->id)->exists();
        return view('data.soal.hasil', compact('soal', 'siswa', 'answer', 'exists'));
    }
}
