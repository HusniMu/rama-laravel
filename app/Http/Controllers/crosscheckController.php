<?php

namespace App\Http\Controllers;

use App\Models\Crosscheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class crosscheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crosschecks = DB::table('jurnal')
            ->where('deleted', null)
            ->where('juref', 'CROSS_CHECK')
            ->orWhere('juref', 'DRAFT_CROSS_CHECK')
            ->where('suspended', null)
            ->get(["juno", "jutgl", "juref"])
//            ->paginate(10)
        ;
        // dd($crosschecks);

        return view('crosscheck.index', compact('crosschecks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('crosscheck.create', compact('crosschecks'));
        return view('crosscheck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = $request->tanggal_buat;
        $juno = "AJ-" . $tanggal;
        $juref = "DRAFT_CROSS_CHECK";

        DB::table('jurnal')->insert([
            'juno' => $juno,
            'oid' => 1,
            'jutgl' => $tanggal,
            'modified' => NOW(),
            'juref' => $juref,
        ]);

        DB::select('call temp_cc("' . $juno . '")');

        // return view('crossscheck.edit');
        return Redirect::route('edit-crosscheck', $juno);

        // dd($juno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crosscheck  $crosscheck
     * @return \Illuminate\Http\Response
     */
    public function show($juno)
    {
        // $juno = DB::table('jurnal')->where('juno', 'juno')->get();

        // dd("aaa");
        // return view("crosscheck.edit", compact('juno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crosscheck  $crosscheck
     * @return \Illuminate\Http\Response
     */
    public function edit($juno)
    {
        DB::enableQueryLog();
        $juno = DB::table('jurnal')->where('juno', $juno)->first();

        $crosschecks = DB::select('call new_temp_cc("' . $juno->juno . '", "' . $juno->jutgl . '", 0)');
        // dd($crosschecks);
        return view("crosscheck.edit", compact('juno', 'crosschecks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crosscheck  $crosscheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $juno)
    {
        $juno = $juno;
        $itkode = $request->cc_id;
        $old_qty = $request->cc_old_qty;
        $new_qty = $request->new_qty;
        $qty = $new_qty - $old_qty;

//        DB::enableQueryLog();

        $update = DB::table('temp_cc')->where('juno', $juno)->where('itkode', $itkode)->update(["selisih" => $qty]);

        if ($update) {
            return json_encode($qty);
        } else {
            return json_encode("fail");
        }
    }

    public function updatePerm(Request $request, $juno)
    {
        $juno = $juno;
        $tanggal = $request->tanggal_buat;
        $keterangan = $request->keterangan;
        $final = $request->permanen != ''? 'CROSS_CHECK' : 'DRAFT_CROSS_CHECK';

//        dd($juno, $tanggal, $keterangan, $final);
        $update = DB::table('jurnal')->where('juno', $juno)->update(["jutgl"=>$tanggal, "jucatatan"=>$keterangan, "juref"=>$final]);

        if($update && $final == "CROSS_CHECK"){
            $finUpdate = DB::select('call new_jurnal_detail("' . $juno . '")');
            return Redirect::route('riwayat-crosscheck');
        } else {
            return Redirect::route('edit-crosscheck', $juno);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crosscheck  $crosscheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crosscheck $crosscheck)
    {
        //


    }
}
