<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
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
        $jumlah_problem = Problem::count();
        $cari = $request->cari;
        $data_problem  = Problem::latest()->paginate(10);

        if (request('cari')) {
            $data_problem   = Problem::where('name', 'like', "%".$request->cari."%")
            ->orWhere('nopol', 'like', "%".$request->cari."%")
            ->orWhere('nik', 'like', "%".$request->cari."%")
            ->orWhere('kejadian', 'like', "%".$request->cari."%")
            ->paginate(10);
        }
        // dd($data_problem);
        return view('problem.index', compact('data_problem','jumlah_problem','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $problem = new Problem;
        return view('problem.create', compact('problem'));
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
            'nopol'             =>  'required|unique:problems',
            'name'              =>  'required',
            'nik'               =>  'required',
            'agama'             =>  'required',
            'pekerjaan'         =>  'required',
            'negara'            =>  'required',
            'jk'                =>  'required',
            'status'            =>  'required',
            'alamat'            =>  'required',
            'tlp'               =>  'required',
            'j_kendaraan'       =>  'required',
            'no_stnk'           =>  'required',
            'kejadian'          =>  'required',
            'kronologi'         =>  'required',
            'gb_customer'       =>  'required|image|mimes:jpeg,jpg,png',
        ]);

        $image_customer       = $request  ->file('gb_customer');
        $new_image_customer   = rand().'.'.$image_customer      ->getClientOriginalExtension();


        Problem::create([
            'nopol'             =>  $request->nopol,
            'id_user'           =>  Auth::id(),
            'waktu'             =>  now(),
            'gb_customer'       =>  $new_image_customer,
            'name'              =>  $request->name,
            'nik'               =>  $request->nik,
            'agama'             =>  $request->agama,
            'pekerjaan'         =>  $request->pekerjaan,
            'negara'            =>  $request->negara,
            'jk'                =>  $request->jk,
            'alamat'            =>  $request->alamat,
            'tlp'               =>  $request->tlp,
            'status'            =>  $request->status,
            'j_kendaraan'       =>  $request->j_kendaraan,
            'no_stnk'           =>  $request->no_stnk,
            'kejadian'          =>  $request->kejadian,
            'penanganan'        =>  $request->penanganan,
            'kronologi'         =>  $request->kronologi,
        ]);

        $image_customer       ->  move(public_path('imgProblem'), $new_image_customer);

        return redirect()   ->  route('problem.index')
                                ->  with('pesan','data kendaraan Masalah behasil di simpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = Problem::find($id);
        // dd($problem);
        return view('problem.show', compact('problem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problem = Problem::findorfail($id);
        return view('problem.edit', compact('problem'));
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
        $problem = Problem::findorfail($id);

        if($request -> has ( 
            'gb_customer',
        )){
            $problem->waktu             = now();
            $problem->id_user           = Auth::id();
            $problem->name              = $request->name;
            $problem->nik               = $request->nik;
            $problem->agama             = $request->agama;
            $problem->pekerjaan         = $request->pekerjaan;
            $problem->negara            = $request->negara;
            $problem->jk                = $request->jk;
            $problem->alamat            = $request->alamat;
            $problem->tlp               = $request->tlp;
            $problem->nolpol            = $request->nopol;
            $problem->status            = $request->status;
            $problem->no_stnk           = $request->no_stnk;
            $problem->j_kendaraan       = $request->j_kendaraan;
            $problem->kejadian          = $request->kejadian;
            $problem->kronologi         = $request->kronologi;
            $problem->penanganan         = $request->penanganan;

            $image_customer                = $request  ->file('gb_customer');
            $new_image_customer            = rand().'.'.$image_customer ->getClientOriginalExtension();
            $problem         ->gb_customer = $new_image_customer;
            $image_customer     ->  move(public_path('imgProblem'), $new_image_customer); 

        } else {
            $problem->waktu             = now();
            $problem->id_user           = Auth::id();
            $problem->name              = $request->name;
            $problem->nik               = $request->nik;
            $problem->agama             = $request->agama;
            $problem->pekerjaan         = $request->pekerjaan;
            $problem->negara            = $request->negara;
            $problem->jk                = $request->jk;
            $problem->alamat            = $request->alamat;
            $problem->tlp               = $request->tlp;
            $problem->nopol             = $request->nopol;
            $problem->status            = $request->status;
            $problem->no_stnk           = $request->no_stnk;
            $problem->j_kendaraan       = $request->j_kendaraan;
            $problem->kejadian          = $request->kejadian;
            $problem->kronologi         = $request->kronologi;
            $problem->penanganan        = $request->penanganan;
        }

        $problem->update();

        return redirect()   ->route('problem.index')
                            ->with('pesan','data kendaraan masalah behasil di Ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problem = Problem::find($id);
        $problem->delete();
        return redirect()   ->route('problem.index')
                            ->with('pesan','data kendaraan problem behasil di hapus.');
    }

    public function print($id)
    {
        $problem = Problem::findorfail($id);
        $pdf =PDF::loadview('problem.print', compact('problem'))->setOptions(['defaultFont' => 'sans-serif']);
        // dd($problem);
        // return $pdf->download('problem.print');
        return $pdf->stream();
    }
}
