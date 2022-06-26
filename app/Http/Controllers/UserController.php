<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jumlah_user = User::count();
        $cari = $request->cari;
        $data_user   = User::latest()->paginate(5);

        if (request('cari')) {
            $data_user   = User::where('panggilan', 'like', "%".$request->cari."%")
            ->orWhere('name', 'like', "%".$request->cari."%")
            ->orWhere('nik', 'like', "%".$request->cari."%")
            ->paginate(10);
        }
        // dd($data_user);
        return view('user.index', compact('data_user','jumlah_user','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'panggilan'=>'required',
            'nik'=>'required|unique:users',
            'agama'=>'required',
            'jk'=>'required',
            'status'=>'required',
            'alamat'=>'required',
            'tlp'=>'required',
            'jabatan'=>'required',
            'lokasi_kerja'=>'required',
            'gb_user'=>'required|image|mimes:jpeg,jpg,png',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:4',
            ]);
    
            $user = new User;
            $user->waktu             = now();
            $user->name              = $request->name;
            $user->panggilan         = $request->panggilan;
            $user->agama             = $request->agama;
            $user->nik               = $request->nik;
            $user->jk                = $request->jk;
            $user->status            = $request->status;
            $user->alamat            = $request->alamat;
            $user->tlp               = $request->tlp;
            $user->jabatan           = $request->jabatan;
            $user->lokasi_kerja      = $request->lokasi_kerja;
            $user->email             = $request->email;
            $user->password          = bcrypt( $request->password );
    
            $image_user              = $request  ->file('gb_user');
            $new_image_user          = rand().'.'.$image_user   ->getClientOriginalExtension();
            $user->gb_user           = $new_image_user;
            $image_user              ->move(public_path('imgUser'), $new_image_user);
    
            $user -> save();
    
            // dd($user);
    
            return redirect()   ->route('user.index')
                                ->with('pesan','data Petugas behasil di simpan.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('user.edit', compact('user'));
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
        $user = User::find($id);
        if($request -> has ( 
            'gb_user',
            'email',
        )){
            $user->waktu             = now();
            $user->name              = $request->name;
            $user->panggilan         = $request->panggilan;
            $user->nik               = $request->nik;
            $user->agama             = $request->agama;
            $user->jk                = $request->jk;
            $user->status            = $request->status;
            $user->alamat            = $request->alamat;
            $user->tlp                = $request->tlp;
            $user->jabatan           = $request->jabatan;
            $user->lokasi_kerja      = $request->lokasi_kerja;
            $user->email             = $request->email;
            $user->password          = bcrypt( $request->password );

            $image_user              = $request  ->file('gb_user');
            $new_image_user          = rand().'.'.$image_user   ->getClientOriginalExtension();
            $user->gb_user           = $new_image_user;
            $image_user              ->move(public_path('imgUser'), $new_image_user);

        } else {
            $user->waktu             = now();
            $user->name              = $request->name;
            $user->panggilan         = $request->panggilan;
            $user->nik               = $request->nik;
            $user->agama             = $request->agama;
            $user->jk                = $request->jk;
            $user->status            = $request->status;
            $user->alamat            = $request->alamat;
            $user->tlp               = $request->tlp;
            $user->jabatan           = $request->jabatan;
            $user->lokasi_kerja      = $request->lokasi_kerja;
            $user->password          = bcrypt( $request->password );
        }

        $user -> update();

        // dd($user);
        return redirect()   ->route('user.index')
                            ->with('pesan','Data User Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()   ->route('user.index')
                            ->with('pesan','data petugas behasil di hapus.');
    }

    public function user_print(Request $reques)
    {
        $jumlah_user = User::count();
        $data_user = User::latest()->paginate(50);
        $pdf =PDF::loadview('user.user_print', compact('data_user', 'jumlah_user'))
                    ->setOptions(['defaultFont' => 'sans-serif'])
                    ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
