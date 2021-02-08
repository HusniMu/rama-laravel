@extends('layouts.app')
@section('title', 'Edit Jurnal Koreksi Crosscheck')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="mb-3 main-card card">
                <div class="card-body">
                    {{-- <h1 class="mb-3">Edit Jurnal Koreksi Crosscheck {{ $juno->jutgl }}</h1> --}}
                    <h1 class="mb-3">Edit Jurnal Koreksi Crosscheck {{ date('d-m-Y', strtotime($juno->jutgl)) }}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('final-crosscheck',$juno->juno) }}" method="POST" id="form-crosscheck">
                            @csrf
                                <div class="form-group row">
                                    <label for="no-nota" class="col-sm-2 col-form-label">No. Nota</label>
                                    <label for="no-nota" class="col-sm-4 col-form-label">{{ $juno->juno }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal-buat" class="col-sm-2 col-form-label">Tanggal Koreksi</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control-plaintext" id="tanggal-buat" name="tanggal_buat" required autofocus value="{{ $juno->jutgl }}" {{$juno->juref== "CROSS_CHECK" ? 'disabled': ''}}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="status" class="col-sm-4 col-form-label">{{ $juno->juref }}</label>
                                </div>
                                <table class="table" id="tbl-cc">
                                    <thead>
                                        <tr>
                                            <th>
                                                Kode Barang
                                            </th>
                                            <th>
                                                Nama Barang
                                            </th>
                                            <th>
                                                Jumlah Barang di Sistem
                                            </th>
                                            <th>
                                                Jumlah Barang di Gudang
                                            </th>
                                            <th>
                                                Selisih
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($crosschecks as $key => $cc)
                                        <tr cc-id="{{ $cc->itkode }}" cc-old-qty="{{ $cc->qty }}">
                                            <td>{{ $cc->itkode }}</td>
                                            <td>{{ $cc->itnama }}</td>
                                            <td>{{ $cc->qty }}</td>
                                            <td>
                                                <input type="number" name="new_qty" new_qty cc-qty="qty-{{ $cc->itkode }}" placeholder="{{ $cc->qty+$cc->selisih }}" {{$juno->juref== "CROSS_CHECK" ? 'disabled': ''}}>
                                            </td>
                                            <td selisih>
                                                {{ $cc->selisih }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="form-group row mt-3">
                                    <label for="keterangan" class="col-md-2 col-form-label">Keterangan</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan" placeholder="keterangan..."  {{$juno->juref== "CROSS_CHECK" ? 'disabled': ''}}>{{$juno->jucatatan}}</textarea>
                                    </div>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="permanen" id="permanen" name="permanen"  {{$juno->juref== "CROSS_CHECK" ? 'disabled checked': ''}}>
                                    <label class="form-check-label" for="permanen">
                                        <strong>Simpan Permanen</strong>
                                    </label>
                                </div>
                                <button class="btn btn-lg btn-block btn-success"  {{$juno->juref== "CROSS_CHECK" ? 'disabled': ''}}>Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script>

    $(document).ready(function(){
        var status = "{{$juno->juref}}"
        if(status === "CROSS_CHECK"){
            $("#form-crosscheck").prop('disabled', true);
            $("#tanggal-buat").prop('disabled', true);
            $("#keterangan").prop('disabled', true);
        } else {

        }

        var root = $("table#tbl-cc");
		var tbody = root.find("tbody");
        tbody.find("input[cc-qty]").unbind().on("focusout", function(){

            var tr = $(this).closest("tr")
            var cc_id = $(this).closest("tr").attr("cc-id")
            var cc_old_qty = $(this).closest("tr").attr("cc-old-qty")
            var new_qty = tr.find("input[new_qty]").val()
            console.log(cc_id)
            console.log(new_qty)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            if(new_qty !== ''){
                $.post("{{ route('update-crosscheck', $juno->juno) }}", {
                    cc_id:cc_id,
                    cc_old_qty:cc_old_qty,
                    new_qty:new_qty,
                }, function(response) {
                    var r = parseInt(response);
                    if(!isNaN(r)){
                        var selisih = tr.find("td[selisih]")
                        selisih.html(response)
                    } else {
                        console.log("aaa");
                    }
                }, "json").done(function(){
                    alert("data berhasil diubah")
                }).fail(function(){
                    alert("data gagal diubah")
                });
            }
        })
    })

</script>

@endsection
