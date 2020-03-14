<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Siswa::All();
        // $data = \DB::table('t_siswa')->get(); //cara ke 2
        // $data = \DB::select( \DB::raw("SELECT * FROM t_siswa") ); //cara ke3

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa_nama   = $request->input('siswa_nama');
        $siswa_alamat = $request->input('siswa_alamat');
        $siswa_kelas  = $request->input('siswa_kelas');
    
        $data = new \App\Siswa();
        $data->siswa_nama = $siswa_nama;
        $data->siswa_alamat = $siswa_alamat;
        $data->siswa_kelas = $siswa_kelas;
    
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $siswa_nama   = $request->input('siswa_nama');
        $siswa_alamat = $request->input('siswa_alamat');
        $siswa_kelas  = $request->input('siswa_kelas');
    
        $data = \App\Siswa::where('id',$id)->first();
        //$data->chapter_id = $chapter_id;
        $data->siswa_nama   = $siswa_nama;
        $data->siswa_alamat = $siswa_alamat;
        $data->siswa_kelas  = $siswa_kelas;
    
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
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
        $data = \App\Siswa::where('id',$id)->first();
        if($data->delete()){
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
