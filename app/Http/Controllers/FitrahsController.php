<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fitrah;
use App\Orang;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
class FitrahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Builder $htmlBuilder)
    {
        //
    if ($request->ajax()) {
            $fitrahs = Fitrah::with('orang');
            return Datatables::of($fitrahs)
            ->addColumn('action', function($fitrah){
            return view('datatable._action',[
                'model'     => $fitrah,
                'form_url'  => route('fitrah.destroy', $fitrah->id),
                'edit_url'  => route('fitrah.edit', $fitrah->id),
                'confirm_message'=>'Yakin mau menghapus  ?'
            
                ]);
        })->make(true);
    }

    $html = $htmlBuilder
            ->addColumn(['data' => 'orang.nama', 'name'=>'orang.nama', 'title'=>'Nama'])
            ->addColumn(['data' => 'orang.alamat', 'name'=>'orang.alamat','title'=>'Alamat'])
            ->addColumn(['data' => 'orang.jk', 'name'=>'orang.jk','title'=>'Jenis Kelamin'])
            ->addColumn(['data' => 'jenis_zakat', 'name'=>'jenis_zakat','title'=>'Jenis Zakat'])
            ->addColumn(['data' => 'created_at','name'=>'created_at','title'=>'Tgl Zakat'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Opsi', 'orderable'=>false, 'searchable'=>false]);
            
    $uang=Fitrah::where('jenis_zakat','uang')->count();
    $beras=Fitrah::where('jenis_zakat','beras')->count();
    $hasilu=$uang*32400 ;
    $hasilb=$beras*2.7;
    $c=number_format($hasilu,2,',','.');
    // dd($uang);
        return view('fitrah.index')->with(compact('html','hasilb','c','beras','uang'));
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
        
        $this->validate($request, [
            'nama' => 'required|min:1',
            'alamat' => 'required|min:5',
            'jk' => 'required|min:1',
            'zakat' => 'required|min:1'
            ]);
        $orang = Orang::create([
          'nama'   => $request['nama'],
          'alamat' => $request['alamat'],
          'jk'     => $request['jk']
           ]);

        $fitrah = new Fitrah;
        $fitrah->jenis_zakat = $request->zakat;
        $fitrah->orang_id = $orang->id;
        $fitrah->save();

        Session::flash("flash_notification",[
                "level"=>"success",
                "message"=>"Tambah data berhasil"
                ]);

        return redirect('pengurus/fitrah');

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
        $fitrah=Fitrah::find($id);
        return view('fitrah.edit')->with(compact('fitrah'));
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
        Fitrah::destroy($id);

        Session::flash("flash_notification",[
                "level"=>"success",
                "message"=>"Data berhasil dihapus"
                ]);

        return redirect('pengurus/fitrah');
    }
}
