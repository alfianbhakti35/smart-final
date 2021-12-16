@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-5">
    <div class="row">

        @foreach ($matakuliah as $m)

        <div class="col-sm-6 col-md-3">
            <div class="card card-primary">
                    <div class="card-body skew-shadow">
                        <h3><a href="/mahasiswa/materi/{{ $m['id'] }}" class="stretched-link"> Matakuliah {{ $m['nama'] }} </a></h3>
                        @foreach ($dosen as $d)
                            @if ($d['id'] === $m['dosen_id'])
                                <h5 class="op-8">{{ $d['nama'] }}</h5>
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
@endsection
