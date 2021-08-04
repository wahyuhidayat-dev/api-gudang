<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_masuk_Masuk  $barang_masuk_Masuk
     * @return \Illuminate\Http\Response
     */
    public function show(barang_masuk_Masuk $barang_masuk_Masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang_masuk_Masuk  $barang_masuk_Masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_masuk_Masuk $barang_masuk_Masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang_masuk_Masuk  $barang_masuk_Masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang_masuk_Masuk $barang_masuk_Masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang_masuk_Masuk  $barang_masuk_Masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_masuk_Masuk $barang_masuk_Masuk)
    {
        //
    }
    //! get data barang_masuk
    public function getAllBarang_masuk() {
      $barang_masuk = Barang_Masuk::get()->toJson(JSON_PRETTY_PRINT);
      return response($barang_masuk, 200);
    }
    //! find barang_masuk by id
     public function getBarang_masuk($id) {
      if (Barang_Masuk::where('id', $id)->exists()) {
        $barang_masuk = Barang_Masuk::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($barang_masuk, 200);
      } else {
        return response()->json([
          "message" => "barang_masuk not found"
        ], 404);
      }
    }
    //! create data barang_masuk
    public function createBarang_masuk(Request $request) {
      $barang_masuk = new Barang_Masuk;
        $barang_masuk->id_barang= $request->id_barang;
        $barang_masuk->nama_barang= $request->nama_barang;
        $barang_masuk->qty= $request->qty;
        $barang_masuk->kode_barang= $request->kode_barang;
      $barang_masuk->save();

      return response()->json([
        "message" => "barang_masuk record created"
      ], 201);
    }
    //! update data barang_masuk
    public function updateBarang_masuk(Request $request, $id) {
      if (Barang_Masuk::where('id', $id)->exists()) {
        $barang_masuk = Barang_Masuk::find($id);

        $barang_masuk->id_barang= $request->id_barang;
        $barang_masuk->nama_barang= $request->nama_barang;
        $barang_masuk->qty= $request->qty;
        $barang_masuk->kode_barang= $request->kode_barang;
        // $barang_masuk->id_barang = is_null($request->id_barang) ? $barang_masuk->id_barang : $barang_masuk->nama_barang_masuk;
        // $barang_masuk->nama_barang = is_null($request->nama_barang) ? $barang_masuk->nama_barang : $barang_masuk->nama_barang;
        // $barang_masuk->qty = is_null($request->qty) ? $barang_masuk->qty : $barang_masuk->qty;
        // $barang_masuk->kode_barang = is_null($request->kode_barang) ? $barang_masuk->kode_barang : $barang_masuk->kode_barang;
        $barang_masuk->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "barang_masuk not found"
        ], 404);
      }
    }
    //! delete data barang_masuk

        public function deleteBarang_masuk ($id) {
      if(Barang_Masuk::where('id', $id)->exists()) {
        $barang_masuk = Barang_Masuk::find($id);
        $barang_masuk->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "barang_masuk not found"
        ], 404);
      }
    }
}
