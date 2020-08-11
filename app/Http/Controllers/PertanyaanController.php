<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\pertanyaan;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        // $pertanyaans = DB::table('pertanyaans')->get();
        $pertanyaans = pertanyaan::all();
        return view('WebDiskusi.pertanyaan', compact('pertanyaans'));
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
            'judul'=>'required',
            'isi'=>'required'
        ]);

        
        // $users = DB::table('profiles')->get();
        // $users = Profile::all();

        // foreach ($users as $user) {
        //     if ($user->nama_lengkap == $request->nama) {
                //  DB::table('pertanyaans')->insert([
                //     'judul' => $request->judul, 
                //     'isi' => $request->isi,
                //     'tanggal_dibuat' => now(),
                //     'profile_id' => $user->id_profile
                // ]);
                $pertanyaan = new pertanyaan;
                $pertanyaan->judul = $request->judul;
                $pertanyaan->isi = $request->isi;
                $pertanyaan->tanggal_dibuat = now();
                $pertanyaan->user_id = Auth::id();
                $pertanyaan->save();

                return redirect('/pertanyaan/create')->with('status_done','Pertanyaan Berhasil Ditambahkan');
        //     }
        //     else
        //     {
        //         return redirect('/pertanyaan/create')->with('status','Nama Anda Belum Terdaftar!!!');
        //     }
        // }
        // return Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $detail = DB::table('pertanyaans')->join('profiles', 'pertanyaans.profile_id', '=', 'profiles.id_profile')->where('pertanyaans.profile_id', $id)->first();
        $detail = pertanyaan::join('users', 'pertanyaans.user_id', '=', 'users.id')->where('pertanyaans.id_pertanyaan', $id)->first();
        
        // return $detail->judul;
        return view('WebDiskusi.detail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = pertanyaan::find($id);
        return view('WebDiskusi.ubah', compact('pertanyaan') );
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
        // $pertanyaans = DB::table('pertanyaans')->get();

        // foreach ($pertanyaans as $pertanyaan) {
        //     if ($pertanyaan->id_pertanyaan == $id) {
        //         DB::table('pertanyaans')
        //       ->where('id_pertanyaan', $id)
        //       ->update([
        //         'judul' => $request->judul,
        //         'isi' => $request->isi,
        //         'tanggal_diperbaharui' => now()
        //     ]);
        //       return redirect('/pertanyaan')->with('status_ubah','Pertanyaan Berhasil Diubah');
        //     }
        // }

        $pertanyaan = pertanyaan::find($id);
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->tanggal_diperbaharui = now();
        $pertanyaan->save();
        return redirect('/pertanyaan')->with('status_ubah','Pertanyaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('pertanyaans')->where('id_pertanyaan', $id)->delete();
        $pertanyaan = pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect('/pertanyaan')->with('status','Pertanyaan Berhasil Dihapus');
    }
}
