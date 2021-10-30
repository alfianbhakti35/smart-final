@extends('layouts.mahasiswa')

@section('mahasiswa')
<div class="page-inner mt--5">
<div class="row row-card-no-pd mt--2">
    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-chart-pie text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Program Studi</p>

                            @foreach ($prodi as $p)
                                @if ($p['id'] === auth()->user()->prodi_id)
                                <h4 class="card-title">{{ $p['nama'] }}</h4>

                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-coins text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Matakuliah</p>
                            <h4 class="card-title">{{ $matakuliah }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-error text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Materi</p>
                            <h4 class="card-title">{{ $materi }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
