@extends('layouts.app')
@section('title', 'Buat Jurnal Koreksi Crosscheck')
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="mb-3 main-card card">
                <div class="card-body">
                    <h1 class="mb-3">Buat Jurnal Koreksi Crosscheck</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('store-crosscheck') }}" method="POST">
                            @csrf
                                <div class="form-group row">
                                    <label for="no-nota" class="col-sm-2 col-form-label">No. Nota</label>
                                    <label for="no-nota" class="col-sm-4 col-form-label">Generated</label>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal-buat" class="col-sm-2 col-form-label">Tanggal Koreksi</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control-plaintext" id="tanggal-buat" name="tanggal_buat" required autofocus>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Buat</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
