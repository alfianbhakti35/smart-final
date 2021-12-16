@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-10">
    <div class="text-center">
        <h1>Nilai Anda Adalah:</h1>
        <div id="circles-1"></div>
		<h6 class="fw-bold mt-3 mb-0">
            @if ($nilai <= 50)
                Cukup
            @elseif ($nilai <= 80)
                Baik
            @elseif ($nilai <= 99)
                Sangat Baik

            @elseif ($nilai == 100)
                Sempurna
            @endif
        </h6>


        <a href="/mahasiswa" class="btn btn-primary btn-round mt-5">Dashboard</a>
    </div>
</div>


@endsection



