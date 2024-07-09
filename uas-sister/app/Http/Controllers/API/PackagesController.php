<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use Illuminate\Support\Facades\Storage;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $data = Packages::orderBy('package_code','asc')->get();
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'data' => $data 
            ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $dataPackages = new Packages;
            $dataPackages->package_id = $request->package_id;
            $dataPackages->package_code= $request->package_code;
            $dataPackages->package_name = $request->package_name;
            $dataPackages->permalink = $request->permalink;
            $dataPackages->package_desc = $request->package_desc;
            $dataPackages->feature_img = $request->feature_img;
            $dataPackages->comunity_id = $request->comunity_id;
    
            $post = $dataPackages->save();
    
            return response()->json([
                'status'=>true,
                'massage'=>'sukses memasukan data',
            ]);

            if ($request->file) {
                $fileName = $this->generateRandomString();
                $extension = $request->file->extension();

                Storage::putFileAs('image',$request->file,$fileName,'.',  $extension);
            }
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
        $data = Packages::find($id);
        if ($data) {
            return response()->json([
            'status'=>true,
            'massage'=>'Data ditemukan',
            'data'=> $data 
        ], 200);
        } else {
            return response()->json([
                'status'=>false,
                'massage'=>'Data tidak ditemukan',
            ]);
        }
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
    $dataPackages = Packages::find($id);
    if (!$dataPackages) {
        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan',
        ], 404);
    }

    $dataPackages->package_id = $request->package_id;
    $dataPackages->package_code = $request->package_code;
    $dataPackages->package_name = $request->package_name;
    $dataPackages->permalink = $request->permalink;
    $dataPackages->package_desc = $request->package_desc;
    $dataPackages->feature_img = $request->feature_img;
    $dataPackages->comunity_id = $request->comunity_id;

    // Simpan perubahan
    $dataPackages->save();

    // Handle file upload if present
    if ($request->hasFile('file')) {
        $fileName = $this->generateRandomString();
        $extension = $request->file('file')->extension();

        // Simpan file ke storage
        $request->file('file')->storeAs('image', $fileName . '.' . $extension);
    }

    return response()->json([
        'status' => true,
        'message' => 'Sukses melakukan update data',
    ]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataPackages = Packages::find($id);
        if (!$dataPackages) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    
        // Hapus data
        $dataPackages->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'Sukses menghapus data',
        ]);
    }
}
