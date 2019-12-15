<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Partner;
use Carbon\Carbon;
use App\Pengajuan;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TrackingController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Pengajuan::get();
        
        return view('tracking.tracking', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $datas = Partner::get();
        return view('tracking.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Pengajuan::create([
            'date' => $request->input('date'),
            'waktu' => $request->input('waktu'),
            'pic' => $request->input('pic'),
            'no_hp' => $request->input('nohp'),
            'partner' => $request->input('nama_partner'),
            'nama_customer'=>$request->input('nama_customer'),
            'alamat'=>$request->input('alamat'),
            'teknisi'=>$request->input('teknisi')
            
        ]);
        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('tracking.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Pengajuan::findOrFail($id);
        $datas = Partner::get();

        return view('tracking.show', compact('data'), compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Pengajuan::findOrFail($id);
        $datas = Partner::get();
        return view('tracking.edit',compact('datas'), compact('data'));
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
     $user_data = Pengajuan::findOrFail($id);

      if($request->file('gambar')) 
        {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/user", $fileName);
            $user_data->gambar = $fileName;
        }

     $user_data->date = $request->input('date');
     $user_data->waktu = $request->input('waktu');
     $user_data->pic = $request->input('pic');
     $user_data->partner = $request->input('nama_partner');
     $user_data->no_hp = $request->input('no_hp');
     $user_data->nama_customer = $request->input('nama_customer');
     $user_data->alamat = $request->input('alamat');
     $user_data->teknisi = $request->input('teknisi');
     if ($request->input('teknisi') !=null) {
         $user_data->status = "Approved";
     }
     $user_data->update();
     Session::flash('message', 'Berhasil diubah!');
     Session::flash('message_type', 'success');
     return redirect()->to('tracking');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user_data = Pengajuan::findOrFail($id);
            $user_data->delete();
            Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        return redirect()->to('tracking');
    }
}
