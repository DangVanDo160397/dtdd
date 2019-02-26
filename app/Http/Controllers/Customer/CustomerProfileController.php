<?php

namespace App\Http\Controllers\Customer;

use NguyenManh1997\LaravelVietNamDatabase\Models\Province;
use NguyenManh1997\LaravelVietNamDatabase\Models\District;
use NguyenManh1997\LaravelVietNamDatabase\Models\Ward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Customer;
class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __constructor(){
        $this->middleware('Auth:customer');
    }


    public function index()
    {
        $customer = Customer::findOrFail(Auth::guard('customer')->user()->id);
        return view('customer.profile.index',compact('customer'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.profile.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
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
        $customer = Customer::findOrFail($id);
        $address = $request->street.", ".$request->ward.", ".$request->district.", ".$request->province;
        $customer->update(['address' => $address]);
        return redirect()->route('customer.profile.show',$id)->with('alert',' Cập nhật địa chỉ thành công');   
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

    public function get_address(){


        $provinces = Province::orderBy('name','ASC')->get();
        $customer = Customer::findOrFail(Auth::guard('customer')->user()->id);
        return view('customer.profile.address',compact('customer','provinces'));
    }

    public function post_address_province(Request $request){
            $html = '<select name="district" id="district" class="form-control"> <option value="">--Lựa chọn--</option>';
            // $html .= ''
            if($request->ajax()){
                $province = $request->post('province');
                $district = District::where('province_id',$province)->orderBy('name','ASC')->get();
                foreach ($district as $value) {    
                    $html .= "<option value=' ".$value->district_id." '> ".$value->name. "</option> ";      
                }
                $html .= '</select>';
                echo $html;
            }
            
    }

    public function post_address_district(Request $request){
            $html = '<select name="ward" id="ward" class="form-control"> <option value="">--Lựa chọn--</option>';
            if($request->ajax()){
                 $district = $request->post('district');
                 $ward = Ward::where('district_id',$district)->orderBy('name','ASC')->get();
                foreach ($ward as $value) {    
                    $html .= "<option value=' ".$value->ward_id." '> ".$value->name. "</option> ";      
                }
                $html .= '</select>';
                echo $html;
            }
            
    }

    public function change_address(Request $request,$id){
        dd($address);
        $customer = Customer::findOrFail($id);
        $address = $request->province.", ".$request->district.", ".$request->ward.", ".$request->street;
        
    }
}
