<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Karyawan::all();
    }

    //! get data karyawan

    public function getAllKaryawan() {
      $karyawan = Karyawan::get()->toJson(JSON_PRETTY_PRINT);
      return response($karyawan, 200);
    }

    //! find karyawan by id

     public function getKaryawan($id) {
      if (Karyawan::where('id', $id)->exists()) {
        $karyawan = Karyawan::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($karyawan, 200);
      } else {
        return response()->json([
          "message" => "karyawan not found"
        ], 404);
      }
    }

    //! create data karyawan

    public function createKaryawan(Request $request) {
      $karyawan = new Karyawan;
        $karyawan->name= $request->name;
        $karyawan->nik= $request->nik;
        $karyawan->password= $request->password;
      $karyawan->save();

      return response()->json([
        "message" => "karyawan record created"
      ], 201);
    }

    //! update data karyawan

    public function updateKaryawan(Request $request, $id) {
      
      if (Karyawan::where('id', $id)->exists()) {
        $karyawan = Karyawan::find($id);
        // $karyawan->is_null($request->name)? $request->name : $request->name;
        // $karyawan->is_null($request->nik) ? $request->nik : $request->nik;
        $karyawan->name= $request->name;
        $karyawan->nik= $request->nik;
        $karyawan->save();
        
        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "karyawan not found"
        ], 404);
      }
    }

    //! delete data karyawan

        public function deleteKaryawan ($id) {
      if(Karyawan::where('id', $id)->exists()) {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "karyawan not found"
        ], 404);
      }
    }

    //! login
    public function login(Request $request){  

      $user = Karyawan::where('nik',$request->nik)->exists();
      //print_r($user);
    if(!$user){
    return response()->json(['message' => 'User not found.'], 401);
    }
  $pass = Karyawan::where('password', $request->password)->exists();
  if (!$pass) {
    return response()->json(['message' => 'Wrong password'], 401);
  } else {
    return response()->json(["message" => "Success Login"], 200);
    }

      }
        }
    
    

