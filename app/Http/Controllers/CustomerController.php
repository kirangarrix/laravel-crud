<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers=Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.create');
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
        $request->validate([
            'firstName' => 'required',
            'lastName' =>'required',
            'place'=>'required'
        ]);

        // Save to Db
        $customer=new Customer;
        $customer->first_name=$request->get('firstName');
        $customer->last_name=$request->get('lastName');
        $customer->place=$request->get('place');
        $customer->save();

        return redirect()->back()->with('success','Successfully Create');
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
        $customer= Customer::find($id);
        return view('customers.show',compact('customer'));
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
        $customer= Customer::find($id);
        return view('customers.edit',compact('customer'));
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
        //save to db
    //   dd($request);

    $customer= Customer::find($id);
    $customer->first_name=$request->get('firstName');
    $customer->last_name=$request->get('lastName');
    $customer->place=$request->get('place');
    $customer->save();

    return redirect('/customers/'. $id)->with('success','Successfully Updated');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete from db
        $customer=Customer::find($id);
        $customer->delete();

        return redirect('/customers/')->with('success','Successfully Deleted');
    }
}
