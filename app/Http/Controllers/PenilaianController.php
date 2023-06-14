<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Answer;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index(Request $request)
    {
        // $answer = Answer::all();
        $kelas = Kelas::all();

        // Filter
        $filter = $request->query('id_kelas');

        if (!empty($filter)) {
            $data = DB::table('penilaian')
                ->rightJoin('siswa', 'penilaian.id_siswa', '=', 'siswa.id')
                ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id')
                ->where('siswa.id_kelas', '=', $filter)
                ->orderBy('siswa.id_kelas')
                ->orderBy('siswa.nama')
                ->select(['*','siswa.id as id_2'])
                ->paginate(10);
        } else {
            $data = DB::table('penilaian')
                ->rightJoin('siswa', 'penilaian.id_siswa', '=', 'siswa.id')
                ->leftJoin('kelas', 'siswa.id_kelas', '=', 'kelas.id')
                ->orderBy('siswa.id_kelas')
                ->orderBy('siswa.nama')
                ->select(['*','siswa.id as id_2'])
                ->paginate(10);
        }
        $data->withQueryString();
        return view('data.penilaian.index', compact('data', 'kelas', 'filter'));
    }

    public function processUpdate(Request $request, $id)
    {
        $id = base64_decode($id);
        $process = Penilaian::where('id_siswa', $id);
        if ($process->count() > 0) {
            $process->update([
                'sikap' => count($request->input('s')) ?? 0,
                'ketrampilan' => count($request->input('k')) ?? 0,
                'catatan' => $request->catatan,
                'a' => $request->k[0] ?? 'off',
                'b' => $request->k[1] ?? 'off',
                'c' => $request->k[2] ?? 'off',
                'd' => $request->k[3] ?? 'off',
                'e' => $request->k[4] ?? 'off',
                'f' => $request->k[5] ?? 'off',
                'g' => $request->k[6] ?? 'off',
                'h' => $request->k[7] ?? 'off',
                'i' => $request->k[8] ?? 'off',
                'j' => $request->k[9] ?? 'off',
                'k' => $request->k[10] ?? 'off',
                'l' => $request->k[11] ?? 'off',
                'aa' => $request->s[0] ?? 'off',
                'bb' => $request->s[1] ?? 'off',
                'cc' => $request->s[2] ?? 'off',
                'dd' => $request->s[3] ?? 'off',
            ]);
            return redirect()->back()->with("successUpdate", "Data updated successfully");
        } else {
            $add = Penilaian::create([
                'id_siswa' => $id,
                'sikap' => count($request->input('s')) ?? 0,
                'ketrampilan' => count($request->input('k')) ?? 0,
                'catatan' => $request->catatan,
                'a' => $request->k[0] ?? 'off',
                'b' => $request->k[1] ?? 'off',
                'c' => $request->k[2] ?? 'off',
                'd' => $request->k[3] ?? 'off',
                'e' => $request->k[4] ?? 'off',
                'f' => $request->k[5] ?? 'off',
                'g' => $request->k[6] ?? 'off',
                'h' => $request->k[7] ?? 'off',
                'i' => $request->k[8] ?? 'off',
                'j' => $request->k[9] ?? 'off',
                'k' => $request->k[10] ?? 'off',
                'l' => $request->k[11] ?? 'off',
                'aa' => $request->s[0] ?? 'off',
                'bb' => $request->s[1] ?? 'off',
                'cc' => $request->s[2] ?? 'off',
                'dd' => $request->s[3] ?? 'off',
            ]);
            if ($add) {
                return redirect()->back()->with("successUpdate", "Data updated successfully");
            } else {
                return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
            }
        }
    }
}
