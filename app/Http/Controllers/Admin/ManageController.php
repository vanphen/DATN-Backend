<?php

namespace App\Http\Controllers\Admin;
use App;
use App\User;
use App\Http\Controllers\Controller;
use App\Manage;
use Illuminate\Http\Request;
use Carbon\Carbon as BaseCarbon;
use Illuminate\Support\Facades\Hash;
class ManageController extends Controller
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
    {
        $users = [];
        $employees = App\User::where('company_id', auth()->user()->company_id)->get();
        foreach($employees as $info) {
            if ($info->type == 2 && auth()->user()->company_id) {
                $users[] =  [
                    'id'     => $info->id,
                    'name'   => $info->name,
                    'email'  => $info->email,
                    'phone'  => $info->phone,
                    'create' => $info->created_at->format('M d Y'),
                    'update' => $info->updated_at->format('M d Y'),
                ];
            }
        }
        return view('admin.manage', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = $request->all()['params'];
        $checkUser =  App\User::where('email', $user['user']['email'])->first();
        if (!$checkUser) {
            $userCreate= App\User::create([
                'email' =>  $user['user']['email'],
                'name' => $user['user']['name'],
                'password' => Hash::make($user['user']['password']),
                'phone' => $user['user']['phone'],
                'type' => $user['user']['type'],
                'company_id' => $user['user']['company_id'],
            ]);

            return json_encode([
                'status' => 'OK',
                'data' => $userCreate,
                'created_at' => date("M d Y", strtotime($userCreate['created_at'])),
                'updated_at' => date("M d Y", strtotime($userCreate['updated_at'])),
            ]);
        }
        return json_encode([
            'status' => 'FAIL',   
        ]);
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
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(Manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(Manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->all()['params'];
        App\User::where('id', $user['user']['id'])->update([
            'name' => $user['user']['name'],
            'email' => $user['user']['email'],
            'phone' => $user['user']['phone'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // App\User::where('id', $id)->delete();
    }
}
