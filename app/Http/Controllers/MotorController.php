<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
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
        $jumlah_motor = Motor::count();
        $cari = $request->cari;
        $data_motor = Motor::orderBy('updated_at', 'desc')->paginate(20);

        if (request('cari')) {
            $data_motor   = Motor::where('nopol', 'like', "%".$request->cari."%")
            ->orWhere('status', 'like', "%".$request->cari."%")
            ->paginate(10);
        }
        return view('motor.index', compact('data_motor', 'jumlah_motor','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motor = new Motor;
        return view('motor.create', compact('motor'));
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
            'nopol'             => 'required|unique:motors',
            'type'              => 'required',
            'spion'             => 'required',
            'ban'               => 'required',
            'area_parkir'       => 'required',
            'gb_depan'          => 'required|image|mimes:jpeg,jpg,png',
            'gb_kanan'          => 'required|image|mimes:jpeg,jpg,png',
            'gb_belakang'       => 'required|image|mimes:jpeg,jpg,png',
            'gb_kiri'           => 'required|image|mimes:jpeg,jpg,png',
        ]);
        
        $image_depan            = $request  ->file('gb_depan');
        $image_kanan            = $request  ->file('gb_kanan');
        $image_belakang         = $request  ->file('gb_belakang');
        $image_kiri             = $request  ->file('gb_kiri');

        $new_image_depan        = rand().'.'.$image_depan     ->getClientOriginalExtension();
        $new_image_kanan        = rand().'.'.$image_kanan     ->getClientOriginalExtension();
        $new_image_belakang     = rand().'.'.$image_belakang  ->getClientOriginalExtension();
        $new_image_kiri         = rand().'.'.$image_kiri      ->getClientOriginalExtension();
        
        Motor::create([
            'id_user'           => Auth::id(),
            'waktu'              => now(),
            'nopol'             =>  $request->nopol,
            'type'              =>  $request->type,
            'spion'             => $request->spion,
            'ban'               => $request->ban,
            'area_parkir'       => $request->area_parkir,
            'gb_depan'          => $new_image_depan,
            'gb_belakang'       => $new_image_belakang,
            'gb_kanan'          => $new_image_kanan,
            'gb_kiri'           => $new_image_kiri,
            'kondisi'           => $request->kondisi,
            'status'            => $request->status,
            'ket'               => $request->ket,
        ]);
        
        $image_depan            -> move(public_path('imgMtr'), $new_image_depan);
        $image_kanan            -> move(public_path('imgMtr'), $new_image_kanan);
        $image_belakang         -> move(public_path('imgMtr'), $new_image_belakang);
        $image_kiri             -> move(public_path('imgMtr'), $new_image_kiri);

        return redirect()       -> route('motor.index')
                                -> with('pesan','data kendaraan Motor behasil di simpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = Motor::find($id);
        // dd($motor);
        return view('motor.show', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Motor::findorfail($id);
        return view('motor.edit', compact('motor'));
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
        $motor = Motor::findorfail($id);
        if($request -> has ( 
            'gb_depan',
            'gb_kanan',
            'gb_belakang',
            'gb_kiri',
        )){
            $motor->waktu            = now();
            $motor->id_user         = Auth::id();
            $motor->nopol           =$request->nopol;
            $motor->type            =$request->type;
            $motor->spion           =$request->spion;
            $motor->ban             =$request->ban;
            $motor->area_parkir     =$request->area_parkir;

            $image_depan              = $request  ->file('gb_depan');
            $new_image_depan          = rand().'.'.$image_depan   ->getClientOriginalExtension();
            $motor->gb_depan          = $new_image_depan;
            $image_depan              ->move(public_path('imgMtr'), $new_image_depan);

            $image_kanan              = $request  ->file('gb_kanan');
            $new_image_kanan          = rand().'.'.$image_kanan   ->getClientOriginalExtension();
            $motor->gb_kanan          = $new_image_kanan;
            $image_kanan              ->move(public_path('imgMtr'), $new_image_kanan);

            $image_belakang              = $request  ->file('gb_belakang');
            $new_image_belakang          = rand().'.'.$image_belakang   ->getClientOriginalExtension();
            $motor->gb_belakang          = $new_image_belakang;
            $image_belakang              ->move(public_path('imgMtr'), $new_image_belakang);

            $image_kiri              = $request  ->file('gb_kiri');
            $new_image_kiri          = rand().'.'.$image_kiri   ->getClientOriginalExtension();
            $motor->gb_kiri          = $new_image_kiri;
            $image_kiri              ->move(public_path('imgMtr'), $new_image_kiri);

            $motor->kondisi          =$request->kondisi;
            $motor->status           =$request->status;
            $motor->ket              =$request->ket;
        } else {
            $motor->waktu            = now();
            $motor->id_user         = Auth::id();
            $motor->nopol           =$request->nopol;
            $motor->type            =$request->type;
            $motor->spion           =$request->spion;
            $motor->ban             =$request->ban;
            $motor->area_parkir     =$request->area_parkir;
            $motor->kondisi         =$request->kondisi;
            $motor->status          =$request->status;
            $motor->ket              =$request->ket;
            
        }
        
        $motor->update();

        return redirect()   ->route('motor.index')
        ->with('pesan','data kendaraan Motor behasil di Ubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Motor::find($id);
        $motor->delete();
        return redirect()   ->route('motor.index');
    }

    public function print($id)
    {
        $motor = Motor::findorfail($id);
        $pdf =PDF::loadview('motor.print', compact('motor'))->setOptions(['defaultFont' => 'sans-serif']);
        // dd($motor);
        // return $pdf->download('motor.print');
        return $pdf->stream();
    }

    public function motor_print(Request $request)
    {
        $jumlah_motor = Motor::count();
        $tanggal_awal =  $request->tanggal_awal . ' 00:00:00';
        $tanggal_akhir = $request->tanggal_akhir . ' 23:59:59';

        $data_motor = motor::whereBetween('waktu',[$tanggal_awal, $tanggal_akhir])->latest()->get();

        $pdf =PDF::loadview('motor.motor_print', compact('data_motor', 'jumlah_motor'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('a4', 'landscape');
        return $pdf->download('Data Kendaraan motor.pdf');
    }
}
