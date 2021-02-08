@extends('layouts.app')
@section('title', 'welcome')
@section('content')
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="mb-3 card widget-content bg-light">
                <div class="text-dark widget-content-wrapper">
                    <h1>hello</h1>
                    {{ request()->fullUrl() }}
                    {{ route('dashboard') }}
                    {{-- {{ Route::currentRouteName()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection