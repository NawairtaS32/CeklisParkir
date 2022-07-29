<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class MobilController extends Controller
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
        $cari = $request->cari;     
        $data_mobil = Mobil::latest()->paginate(20);

        if (request('cari')) {
            $data_mobil   = Mobil::where('nopol', 'like', "%".$request->cari."%")
            ->orWhere('type', 'like', "%".$request->cari."%")
            ->orWhere('status', 'like', "%".$request->cari."%")
            ->paginate(20);
        }
        return view('mobil.index', compact('data_mobil','cari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = new Mobil;
        return view('mobil.create', compact('mobil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request,
        [
            'nopol'             =>  'required|unique:mobils',
            'type'              =>  'required',
            'spion'             =>  'required',
            'ban'               =>  'required',
            'area_parkir'       =>  'required',
            'gb_depan'          =>  'required|image|mimes:jpeg,jpg,png',
            'gb_kanan'          =>  'required|image|mimes:jpeg,jpg,png',
            'gb_belakang'       =>  'required|image|mimes:jpeg,jpg,png',
            'gb_kiri'           =>  'required|image|mimes:jpeg,jpg,png',
            ]);

            $image_kanan        = $request  ->file('gb_kanan');
            $image_belakang     = $request  ->file('gb_belakang');
            $image_kiri         = $request  ->file('gb_kiri');
            $image_depan        = $request  ->file('gb_depan');

            $new_image_depan    = rand().'.'.$image_depan       ->getClientOriginalExtension();
            $new_image_kanan    = rand().'.'.$image_kanan       ->getClientOriginalExtension();
            $new_image_belakang = rand().'.'.$image_belakang    ->getClientOriginalExtension();
            $new_image_kiri     = rand().'.'.$image_kiri        ->getClientOriginalExtension();

        Mobil::create([
            'id_user'       =>  Auth::id(),
            'waktu'         =>  now(),
            'nopol'         =>  $request->nopol,
            'type'          =>  $request->type,
            'spion'         =>  $request->spion,
            'ban'           =>  $request->ban,
            'area_parkir'   =>  $request->area_parkir,
            'gb_depan'      =>  $new_image_depan,
            'gb_kanan'      =>  $new_image_kanan,
            'gb_belakang'   =>  $new_image_belakang,
            'gb_kiri'       =>  $new_image_kiri,
            'kondisi'       =>  $request->kondisi,
            'status'        =>  $request->status,
            'ket'           =>  $request->ket,
        ]);

            $image_depan        ->  move(public_path('imgMbl'), $new_image_depan);
            $image_kanan        ->  move(public_path('imgMbl'), $new_image_kanan);
            $image_belakang     ->  move(public_path('imgMbl'), $new_image_belakang);
            $image_kiri         ->  move(public_path('imgMbl'), $new_image_kiri);

            return redirect()   ->  route('mobil.index')
                                ->  with('pesan','data kendaraan Mobil behasil di simpan.');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::find($id);
        // dd($mobil);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::findorfail($id);
        return view('mobil.edit', compact('mobil'));
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
        // dd($request->all());
        $mobil = Mobil::findorfail($id);
        if($request -> has ( 
            'gb_depan',
            'gb_kanan',
            'gb_belakang',
            'gb_kiri',
        )){
            $mobil->waktu            = now();
            $mobil->id_user         = Auth::id();
            $mobil->nopol           =$request->nopol;
            $mobil->type            =$request->type;
            $mobil->spion           =$request->spion;
            $mobil->ban             =$request->ban;
            $mobil->area_parkir     =$request->area_parkir;

            $image_depan              = $request  ->file('gb_depan');
            $new_image_depan          = rand().'.'.$image_depan   ->getClientOriginalExtension();
            $mobil->gb_depan          = $new_image_depan;
            $image_depan              ->move(public_path('imgMbl'), $new_image_depan);

            $image_kanan              = $request  ->file('gb_kanan');
            $new_image_kanan          = rand().'.'.$image_kanan   ->getClientOriginalExtension();
            $mobil->gb_kanan          = $new_image_kanan;
            $image_kanan              ->move(public_path('imgMbl'), $new_image_kanan);

            $image_belakang              = $request  ->file('gb_belakang');
            $new_image_belakang          = rand().'.'.$image_belakang   ->getClientOriginalExtension();
            $mobil->gb_belakang          = $new_image_belakang;
            $image_belakang              ->move(public_path('imgMbl'), $new_image_belakang);

            $image_kiri              = $request  ->file('gb_kiri');
            $new_image_kiri          = rand().'.'.$image_kiri   ->getClientOriginalExtension();
            $mobil->gb_kiri          = $new_image_kiri;
            $image_kiri              ->move(public_path('imgMbl'), $new_image_kiri);

            $mobil->kondisi          =$request->kondisi;
            $mobil->status           =$request->status;
            $mobil->ket              =$request->ket;
            
            
        } else {
            $mobil->waktu           = now();
            $mobil->id_user         = Auth::id();
            $mobil->nopol           =$request->nopol;
            $mobil->type            =$request->type;
            $mobil->spion           =$request->spion;
            $mobil->ban             =$request->ban;
            $mobil->area_parkir     =$request->area_parkir;
            $mobil->kondisi         =$request->kondisi;
            $mobil->status          =$request->status;
            $mobil->ket             =$request->ket;
        }
        
        $mobil->update();

        return redirect()   ->route('mobil.index')
        ->with('pesan','data kendaraan Mobil behasil di Ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect()   ->route('mobil.index')
                            ->with('pesan','data kendaraan mobil behasil di hapus.');
    }

    public function print($id)
    {
        $mobil = Mobil::findorfail($id);
        $pdf =PDF::loadview('mobil.print', compact('mobil'))->setOptions(['defaultFont' => 'sans-serif']);
        // dd($mobil);
        // return $pdf->download('mobil.print');
        return $pdf->stream();
    }

    public function mobil_print(Request $request)
    {
        $jumlah_mobil = Mobil::count();
        $tanggal_awal =  $request->tanggal_awal . ' 00:00:00';
        $tanggal_akhir = $request->tanggal_akhir . ' 23:59:59';

        $data_mobil = Mobil::whereBetween('waktu',[$tanggal_awal, $tanggal_akhir])->latest()->get();

        $pdf =PDF::loadview('mobil.mobil_print', compact('data_mobil', 'jumlah_mobil'))
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('a4', 'landscape');
        return $pdf->download('Data Kendaraan Mobil.pdf');
    }
}
