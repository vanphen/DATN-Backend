<?php

namespace App\Http\Controllers;
use App\Customer;
use App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $customers = [];

        foreach(Customer::all() as $info) {
            $customers[] = [
                'id'      => $info->id,
                'name'    => $info->name,
                'email'   => $info->email,
                'phone'   => $info->phone,
                'address' => $info->address,
                'ip'      => $info->ip,
                'message' => $info->message,
                'status'  => $info->status,
                'created_at' => $info->created_at,
            ];
        }
        if (auth()->user()->type == 2) {
            return view('customer.customer', [
                'customers' => $customers,
            ]);
        } else {
            return view('admin.customer', [
                'customers' => $customers,
            ]);
        }
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
        Customer::where('id', $id)->update([
            'status' => 1,
        ]);
        return json_encode([
            'status' => 'OK'
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
        $news= Customer::find($id);
        $news->delete();
        return json_encode([
            'status' => 'OK',
        ]);
    }
}
