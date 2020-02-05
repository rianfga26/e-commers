<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showall = \App\Category::all();

        if (count($showall) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $showall;
            return response($res);
        }else {
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
        $request->validate([
            'name' => 'required'
        ]);

        $data = new \App\Category;
        $data->name = $request->input('name');
        $data->slug = $request->input('name');

        if ($data->save()) {
            $res['message'] = "Success!";
            $res['value'] = $data;
            return response($res);
        }else{
            $res['message'] = "Gagal!";
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
        $data = \App\Category::where('id', $id)->get();

        if (count($data) > 0) {
            $res['data'] = $data;
            return response($res);
        }else{
            $res['message'] = 'Data Tidak Ditemukan!';
            return response($res);
        }
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
        //
        $nama = $request->input('name');

        $data = \App\Category::where('id', $id)->first();
        $data->name = $nama;
        $data->slug = $nama;

        if ($data->save()) {
            $res['message'] = 'success!';
            $res['value'] = $data;
            return response($res);
        }else{
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
        //
        $hapus = \App\Category::find($id);
        if (empty($hapus)) {
            $res['message'] = 'data tidak ditemukan';
            return response($res);
        }

        if ($hapus->delete()){
            $res['message'] = 'data terhapus dengan id = '.$hapus->id;
            return response($res);
        }else{
            $res['message'] = 'gagal menghapus data!';
            return response($res);
        }
    }
}
