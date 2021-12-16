@extends('layouts.dosen')
@section('dosen')

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Hasil Evaluasi Mahasiswa</h4>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"></h4>
                        {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Export Data
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 40%">Nama Mahasiswa</th>
                                    <th>Materi</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluasi as $e)

                                <tr>
                                    <td>
                                        @foreach ($mahasiswa as $m)

                                            @if ($m['id'] === $e['mahasiswa_id'])
                                                {{ $m['nama'] }}
                                            @endif

                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($materi as $m)
                                            @if ($m['id'] === $e['materi_id'])
                                                {{ $m['nama'] }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $e['nilai'] }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

@endsection
