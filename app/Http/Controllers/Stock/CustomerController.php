<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;


class CustomerController extends Controller
{
    protected $route = 'components/stock/customer/';


    public function index()
    {
        $customer = Customer::withoutTrashed()->paginate(15);

        return Inertia::render($this->route . 'index', ['customer' => $customer]);
    }
    public function create()
    {
        //
        return Inertia::render($this->route.'create');
    }


    public function store(Request $request)
    {
        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 200);
            $upload_path = 'storage/customer/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->photo = $image_url;
            $customer->save();
        } else {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;

            $customer->save();

        }
        return redirect()->route('customer.index');

    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $customer =Customer::whereId($id)->first();
        return Inertia::render($this->route.'edit',['customer'=>$customer]);
    }



    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $image = $request->newphoto;

        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time() . "." . $ext;
            $img = Image::make($image)->resize(240, 200);
            $upload_path = 'storage/customer/';
            $image_url = $upload_path . $name;
            $success = $img->save($image_url);

            if ($success) {
                $data['photo'] = $image_url;
                $img = Customer::whereId($id)->first();
                $image_path = $img->photo;
                if($image_path){
                    $done = unlink($image_path);
                }
                Customer::whereId($id)->update($data);;
            }

        } else {
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            Customer::whereId($id)->update($data);;
        }
        return redirect()->route('customer.index');
    }


    public function destroy($id)
    {
        $customer =Customer::whereId($id)->first();;
        $photo = $customer->photo;
        if ($photo) {
            unlink($photo);
            Customer::whereId($id)->delete();
        } else {
            Customer::whereId($id)->delete();
        }
    }


}
