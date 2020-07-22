<?php

namespace App\Http\Controllers\User;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Companie;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profile = User::find(auth()->user()->id);
        $nameCompany = Companie::find(auth()->user()->company_id);
        return view('user.profile', [
            'profile' => $profile->toArray(),
            'nameCompany' => $nameCompany->toArray()['name'],
        ]);
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
    public function edit(Request $request)
    {
        $input = $request->all();
        if ($input['_method'] == "PUT") {
            User::where('id', auth()->user()->id)->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'updated_at' => Carbon::now()
            ]);
        }
        $profile = User::find(auth()->user()->id);
        $nameCompany = Companie::find(auth()->user()->company_id);
        return view('user.profile', [
            'profile' => $profile->toArray(),
            'nameCompany' => $nameCompany->toArray()['name'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassWord(Request $request)
    {
        $profile = $request->all()['params'];
        
        if (auth()->attempt(array('email' => $profile['data']['email'], 'password' => $profile['data']['password-old']))) {
            User::where('id', $profile['data']['id'])->update([
                'password' => Hash::make($profile['data']['password-new'])
            ]);
            return json_encode([
                'status' => 'Success',
            ]);
        } else {
            return json_encode([
                'status' => 'Fail',
            ]);
        }
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
