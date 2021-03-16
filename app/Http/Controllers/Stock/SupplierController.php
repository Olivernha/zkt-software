<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{

    public function index()
    {
        //
        $suppliers = Supplier::withoutTrashed()->paginate(15);
        return Inertia::render('components/stock/supplier/index', ['suppliers' => $suppliers]);
    }


    public function create()
    {
        //
        return Inertia::render('components/stock/supplier/create');
    }


    public function store(Request $request)
    {

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 200);
            $upload_path = 'storage/supplier/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->company = $request->company;
            $supplier->address = $request->address;
            $supplier->photo = $image_url;
            $supplier->save();
        } else {
            $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->company = $request->company;
            $supplier->address = $request->address;

            $supplier->save();
        }
        return redirect()->route('supplier.index');
    }


    public function show($id)
    {
        //
        //        $supplier = DB::table('suppliers')->where('id',$id)->first();
        //        return response()->json($supplier);
    }


    public function edit($id)
    {
        //
        $supplier = Supplier::find($id)->first();
        return Inertia::render('components/stock/supplier/edit', ['supplier' => $supplier]);
    }


    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['company'] = $request->company;
        $data['address'] = $request->address;

        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($image)->resize(240, 200);
            $upload_path = 'storage/supplier/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);

            if ($success) {
                $data['photo'] = $image_url;
                $img = Supplier::where('id', $id)->first();
                $image_path = $img->photo;
                if ($image_path) {
                    $done = unlink($image_path);
                }

                $user  = Supplier::where('id', $id)->update($data);
            }
        } else {
            $data['photo'] = $request->photo;
            $user = Supplier::where('id', $id)->update($data);
        }

        return redirect()->route('supplier.index');
    }
    public function destroy($id)
    {
        //
        $supplier = Supplier::where('id', $id)->first();
        $photo = $supplier->photo;
        if ($photo) {
            unlink($photo);
            Supplier::where('id', $id)->delete();
        } else {
            Supplier::where('id', $id)->delete();
        }
        return redirect()->route('supplier.index');
    }
}
