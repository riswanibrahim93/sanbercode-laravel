<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaans = DB::table('pertanyaans')->get();
        return view('WebDiskusi.pertanyaan', ['pertanyaans' => $pertanyaans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('WebDiskusi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'judul'=>'required',
            'isi'=>'required'
        ]);

        $users = DB::table('profiles')->get();

        foreach ($users as $user) {
            if ($user->nama_lengkap == $request->nama) {
                 DB::table('pertanyaans')->insert([
                    'judul' => $request->judul, 
                    'isi' => $request->isi,
                    'tanggal_dibuat' => now(),
                    'profile_id' => $user->id_profile
                ]);
                return redirect('/pertanyaan/create')->with('status_done','Pertanyaan Berhasil Ditambahkan');
            }
            else
            {
                return redirect('/pertanyaan/create')->with('status','Nama Anda Belum Terdaftar!!!');
            }
        }
        // return "csdc";
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('pertanyaans')->join('profiles', 'pertanyaans.profile_id', '=', 'profiles.id_profile')->where('pertanyaans.profile_id', $id)->first();
        
        // return $detail->judul;
        return view('WebDiskusi.detail', ['detail' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('WebDiskusi.ubah', ['id' => $id] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pertanyaans = DB::table('pertanyaans')->get();

        foreach ($pertanyaans as $pertanyaan) {
            if ($pertanyaan->id_pertanyaan == $id) {
                DB::table('pertanyaans')
              ->where('id_pertanyaan', $id)
              ->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal_diperbaharui' => now()
            ]);
              return redirect('/pertanyaan')->with('status_ubah','Pertanyaan Berhasil Diubah');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pertanyaans')->where('id_pertanyaan', $id)->delete();
        return redirect('/pertanyaan')->with('status','Pertanyaan Berhasil Dihapus');
    }
}
