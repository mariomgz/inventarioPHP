<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    function show()
    {
        $unalista = Brand::all();
        return view('brand/list', ['miListaDeMarcas' => $unalista]);
    }

    function form($id = null)
    {
        $brand = new Brand();
        if ($id != null) {

            $brand = Brand::findOrFail($id);
        }

        return view('brand/form', ['brand' => $brand]);
    }

    function save(Request $request)
    {

        $request->validate([
            "name" => 'required|max:50',
        ]);

        $brand = new Brand();
        if ($request->id > 0) {

            $brand = Brand::findOrFail($request->id);
        }

        $brand->name = $request->name;        

        $brand->save();

        return redirect('/brands')->with('message', 'Marca Guardada');
    }

    function delete($id)
    {

        //select * from brands where id=$id;
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('/brands')->with('message', 'Marca borrada correctamente');
    }
}
