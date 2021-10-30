@extends('layouts.mahasiswa')

@section('mahasiswa')

    <div class="page-inner py-5">
        <div class="row">
            <div class="ml-auto mr-auto">
                <iframe src="{{ asset('storage/' . $pdf) }}" width="900" height="500"></iframe>

                {{-- Jawab Soal Evaluasi --}}


            </div>

        </div>
    </div>

@endsection
