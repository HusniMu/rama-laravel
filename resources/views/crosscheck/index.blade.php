@extends('layouts.app')
@section('title', 'Riwayat Jurnal Koreksi Crosscheck')
@section("css")
    <link href="{{  asset('css/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="mb-3 main-card card">
                <div class="card-body">
                    <h1 class="mb-3">Riwayat Jurnal Koreksi Crosscheck</h1>
                    <hr>
                    <table class="table mb-3" id="riwayat-crosscheck">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Jurnal</th>
                                <th>Tanggal Jurnal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($crosschecks as $cc)
                            <tr>
                                <th scope="row">{{ ++$loop->index}}</th>
{{--                                <th scope="row">{{($crosschecks->currentpage()-1)--}}
{{--                                  * $crosschecks->perpage() + $loop->index + 1}}</th>--}}
                                <td>
                                    <a href="{{ route('edit-crosscheck', $cc->juno) }}">
                                        {{ $cc->juno }}
                                    </a>
                                </td>
                                <td>{{ $cc->jutgl }}</td>
                                <td>{{ $cc->juref }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span>
{{--                        {{ $crosschecks->links() }}--}}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#riwayat-crosscheck').DataTable();
        } );
    </script>
@endsection
