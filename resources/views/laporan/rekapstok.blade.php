@extends('layouts.app')
@section('title', 'Cetak Laporan Rekapitulasi Stok')
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="mb-3 main-card card">
                <div class="card-body">
                    <h1 class="mb-3">Cetak Laporan Rekapitulasi Stok</h1>
                    <hr>
                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="mb-3 col-md-6">
                                <label for="tanggal-cetak">Tanggal Cetak</label>
                                <input type="date" class="form-control" id="tanggal-cetak" name="tanggal-cetak" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block btn-lg" type="submit">Cetak</button>
                    </form>

                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
