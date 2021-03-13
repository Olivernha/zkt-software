<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();
        return Inertia::render('components/stock/supplier/index',['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('components/stock/supplier/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->photo) {
            $file_name = time().'_'.$request->photo->getClientOriginalName();
            $file_path = $request->file('photo')->storeAs('uploads', $file_name);


            $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->company = $request->company;
            $supplier->address = $request->address;
            $supplier->photo =   $file_path;
            $supplier->save();
        }else{
            $supplier = new Supplier;
            $supplier->name = $request->name ;
            $supplier->email = $request->email ;
            $supplier->phone = $request->phone ;
            $supplier->company = $request->company;
            $supplier->address = $request->address;

            $supplier->save();

        }
        return redirect()->route('supplier.create');
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
//        $supplier = DB::table('suppliers')->where('id',$id)->first();
//        return response()->json($supplier);
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
        $supplier=Supplier::find($id)->first();
        return Inertia::render('components/stock/supplier/edit',['supplier'=>$supplier]);

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
        $supplier=Supplier::where('id', $id)->first();
        $image = $request->photo;

        if ($image) {
            $file_name = time().'_'.$request->photo->getClientOriginalName();
            $file_path = $request->file('photo')->storeAs('uploads', $file_name);
            $image_path = $supplier->photo;
            $done = unlink($image_path);
        }
        $supplier->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'address' => $request->address,
            'photo'=>$file_path || null

        ]);

        return redirect()->route('supplier.index');

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
        $supplier = DB::table('suppliers')->where('id',$id)->first();
        $photo = $supplier->photo;
        if ($photo) {
            unlink($photo);
            DB::table('suppliers')->where('id',$id)->delete();
        }else{
            DB::table('suppliers')->where('id',$id)->delete();
        }
    }
}
