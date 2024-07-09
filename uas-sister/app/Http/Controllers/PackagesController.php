<?php

namespace App\Http\Controllers;
use App\Models\Packages;
use App\Models\Comunity;

use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title='Admin Packages';
        $packages=Packages::paginate(2);
        $packages = new Packages;
        if (isset($_GET['s'])) {
            $s=$_GET['s'];
            $packages = $packages->where('package_name', 'like', "%$s%");
        }
        if (isset($_GET['comunity_id'])&&$_GET['comunity_id']!='') {

            $packages = $packages->where('comunity_id', 'like', $_GET['comunity_id']);
        }

        $packages = $packages->paginate(2);
        $comunities =Comunity::all();
        return view('backpage.daftarpackage',compact('title','packages','comunities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title='Create Page';
        $comunities=Comunity::all();
        return view('backpage.inputpackage',compact('title','comunities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'package_code' => 'required',
            'package_name' => 'required',
            'permalink' => 'required',
            'package_desc' => '',
            'feature_img' => 'required',
            'comunity_id' => 'required',
            
        ]);
        try {
            $fileName = time() . $request->file('feature_img')->getClientOriginalName();

            $path = $request->file('feature_img')->storeAs('photo',$fileName);

            $validasi['feature_img'] = $path;
            $response = Packages::create($validasi);
            return redirect('package');
        } catch (\Exception $e) {
            echo $e->getMessage();
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
        $title = 'Input Page';
        $comunities = Comunity::all();
        $package = Packages::find($id);
        return view('backpage.inputpackage', compact('title','comunities','package'));
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
        $validasi = $request->validate([
            'package_code' => 'required',
            'package_name' => 'required',
            'permalink' => 'required',
            'package_desc' => '',
            'feature_img' => 'required',
            'comunity_id' => 'required',
        ]);
        try {
            $fileName = time() . $request->file('feature_img')->getClientOriginalName();
            $path = $request->file('feature_img')->storeAs('photo',$fileName);
            $validasi['feature_img'] = $path;
            $response = Packages::find($id)->update($validasi);
            return redirect('package');
        } catch (\Exception $e) {
            echo $e->getMessage();
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
        try{
            $package=Packages::find($id);
            $package->delete();
            return redirect('package');
        }catch (\Throwable $e) {
            echo $e->getMessage();
    }
    }
}
