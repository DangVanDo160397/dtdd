<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\ProductRequest;
use App\Products;
use App\Company;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_products = Products::paginate(5);
         return view('admin.product.index',compact('list_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('admin.product.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $product = $request->except('thumbnail');
        //upload thumbnail
         $allow_type = ["jpg","jpeg","png","svg","png","gif"];
         if($request->hasFile('thumbnail')){
            $thumbnail = $request->thumbnail;
            $file_ext = $thumbnail->getClientOriginalExtension();
            if(in_array($file_ext, $allow_type)){
                // $file_name = 'new_'.time().'.'.$file_ext;
                // $link_thumbnail = $thumbnail->move("upload",$file_name)->getPathname();
                $file_name = $request->thumbnail->store('product'); 
                $product['thumbnail'] = $file_name;
            }
        }
        Products::create($product);
        return redirect()->route('admin.product.index');
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
        $list_product = Products::findOrFail($id);
        return view('admin.product.edit',compact('list_product'));
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
    }
}
