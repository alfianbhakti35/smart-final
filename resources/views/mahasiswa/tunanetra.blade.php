@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-10">
    <div class="text-center">
        <audio src="{{ asset('storage/' . $mp3) }}" controls></audio>
    </div>
</div>
@endsection






