<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        // try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'address' => 'required',
                'no_sim' => 'required',
                'no_handphone' => 'required',
                'password' => 'required|same:confirm-password',
            ]);

            if ($validator->fails()){
                return redirect()->route('register.index')->withErrors($validator)->withInput();
            }

            $user = new User();
            $user->name = $request->name;
            $user->address = $request->address;
            $user->no_sim = $request->no_sim;
            $user->no_handphone = $request->no_handphone;
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();
            return redirect()->route('register.index')->with('success','Pendaftaran Berhasil!');
            
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->route('register.index', $request->id);
        //     // something went wrong
        // }
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
