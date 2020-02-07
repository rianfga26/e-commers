<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $showall = \App\Product::all();

        if (count($showall) > 0) {
            $res['data'] = $showall;
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|unique:products',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric'
        ]);

        $data = new \App\Product;
        $data->name = $request->input('nama');
        $data->slug = Str::slug($request->input('nama'));
        $data->description = $request->input('deskripsi');
        $data->image = $request->input('image');
        $data->price = $request->input('harga');
        $data->weight = $request->input('berat');


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
        $data = \App\Product::where('id', $id)->get();

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

        $data = \App\Product::where('id', $id)->first();
        $data->name = $request->input('nama');
        $data->slug = $request->input('nama');
        $data->description = $request->input('deskripsi');
        $data->image = $request->input('image');
        $data->price = $request->input('harga');
        $data->weight = $request->input('berat');


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
        $hapus = \App\Product::find($id);
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
