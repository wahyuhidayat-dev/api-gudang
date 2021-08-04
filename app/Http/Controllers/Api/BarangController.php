<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    //
    //! get data barang
    public function getAllBarang() {
      $barang = Barang::get()->toJson(JSON_PRETTY_PRINT);
      return response($barang, 200);
    }
    //! find barang by id
     public function getBarang($id) {
      if (Barang::where('id', $id)->exists()) {
        $barang = Barang::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($barang, 200);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
    //! create data barang
    public function createBarang(Request $request) {
      $barang = new Barang;
        $barang->nama_barang= $request->nama_barang;
        $barang->qty= $request->qty;
        $barang->keterangan= $request->keterangan;
        $barang->nama_lokasi= $request->nama_lokasi;
        $barang->kode_barang= $request->kode_barang;
      $barang->save();

      return response()->json([
        "message" => "barang record created"
      ], 201);
    }
    //! update data barang
    public function updateBarang(Request $request, $id) {
      if (Barang::where('id', $id)->exists()) {
        $barang = Barang::find($id);

        $barang->nama_barang = is_null($request->nama_barang) ? $barang->nama_barang : $barang->nama_barang;
        $barang->qty = is_null($request->qty) ? $barang->qty : $barang->qty;
        $barang->keterangan = is_null($request->keterangan) ? $barang->keterangan : $barang->keterangan;
        $barang->nama_lokasi = is_null($request->nama_lokasi) ? $barang->nama_lokasi : $barang->nama_lokasi;
        $barang->kode_barang = is_null($request->kode_barang) ? $barang->kode_barang : $barang->kode_barang;
        $barang->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
    //! delete data barang

        public function deleteBarang ($id) {
      if(Barang::where('id', $id)->exists()) {
        $barang = Barang::find($id);
        $barang->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "barang not found"
        ], 404);
      }
    }
}
