@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-10">
    <div class="text-center">
        <h1>Nilai Anda Adalah:</h1>
        <h1>{{ $nilai }}</h1>

        <a href="/mahasiswa" class="btn btn-primary btn-round mt-5">Dashboard</a>
    </div>
</div>
@endsection



