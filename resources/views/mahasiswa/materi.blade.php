@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-5">
    <div class="row">

        @foreach ($materi as $m)
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $m['nama'] }}</h5>
                    <p class="card-text"></p>
                    <a href="/mahasiswa/tunanetra/{{ $m['id'] }}" class="btn btn-primary">Tunanetra</a>
                    <a href="/mahasiswa/tunarungu/{{ $m['id'] }}" class="btn btn-primary">Tunarungu</a>
                    <a href="/mahasiswa/slow/{{ $m['id'] }}" class="btn btn-primary">Slow Learning</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
