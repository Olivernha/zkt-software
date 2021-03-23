<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    protected $route = 'components/stock/product/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('suppliers','products.supplier_id','suppliers.id')
            ->select('categories.category_name','suppliers.name','products.*')
            ->whereNull('products.deleted_at')
            ->orderBy('products.id','DESC')

            ->paginate(15);
        return Inertia::render($this->route . 'index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render($this->route . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->image)->resize(240, 200);
            $upload_path = 'storage/product/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $product = new Product();
            $product->category_id = $request->category;
            $product->product_name = $request->name;
            $product->product_code = $request->code;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->supplier_id = $request->supplier;
            $product->buying_date = $request->date;
            $product->image = $image_url;
            $product->product_quantity = $request->quantity;
            $product->save();
        } else {
            $product = new Product();
            $product->category_id = $request->category;
            $product->product_name = $request->name;
            $product->product_code = $request->code;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->supplier_id = $request->supplier;
            $product->buying_date = $request->date;
            $product->product_quantity = $request->quantity;
            $product->save();
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = DB::table('products')->where('products.id',$id)
            ->join('categories','products.category_id','categories.id')
            ->join('suppliers','products.supplier_id','suppliers.id')
            ->select('categories.category_name','suppliers.name','products.*')
            ->first();
        return Inertia::render($this->route . 'edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = array();
        $data['category_id'] = $request->category;
        $data['product_name'] = $request->name;
        $data['product_code'] = $request->code;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;
        $data['supplier_id'] = $request->supplier;
        $data['buying_date'] = $request->date;
        $data['product_quantity'] = $request->quantity;

        $image = $request->newimage;
        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($image)->resize(240, 200);
            $upload_path = 'storage/product/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);

            if ($success) {
                $data['image'] = $image_url;
                $img = Product::where('id', $id)->first();
                $image_path = $img->image;
                if ($image_path) {
                    $done = unlink($image_path);
                }
                Product::where('id', $id)->update($data);
            }
        }
        else {
            $data['image'] = $request->image;
            Product::where('id', $id)->update($data);
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::where('id', $id)->first();
        $photo = $product->photo;
        if ($photo) {
            unlink($photo);
            Product::whereId($id)->delete();
        } else {
            Product::whereId($id)->delete();
        }

        return redirect()->route('product.index');
    }
}
