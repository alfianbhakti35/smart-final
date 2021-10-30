@extends('layouts.mahasiswa')

@section('mahasiswa')

<div class="page-inner py-10">
    <div class="card">
        <div class="card-body">
            @php
                $no = 1
            @endphp
            <form action="/mahasiswa/cekevaluasi" method="POST">
                @csrf
                @foreach ($soal as $s)

                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                            <h3>{{ $no }}.</h3>
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <h3>{{ $s['soal'] }} </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="{{ $no }}" value="{{ ($s['jawaban'] === 'a') ? 1 : 0}}">
                                <span class="form-radio-sign">{{ $s['a'] }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="{{ $no }}" value="{{ ($s['jawaban'] === 'b') ? 1 : 0}}">
                                <span class="form-radio-sign">{{ $s['b'] }}</span>
                            </label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="{{ $no }}" value="{{ ($s['jawaban'] === 'c') ? 1 : 0}}">
                                <span class="form-radio-sign">{{ $s['c'] }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="{{ $no }}" value="{{ ($s['jawaban'] === 'd') ? 1 : 0}}">
                                <span class="form-radio-sign">{{ $s['d'] }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-1">
                        </div>
                        <div class="col-sm-6 col-md-11">
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="{{ $no }}" value="{{ ($s['jawaban'] === 'e') ? 1 : 0}}">
                                <span class="form-radio-sign">{{ $s['e'] }}</span>
                            </label>
                        </div>
                    </div>


                    @php
                        $no++
                    @endphp

                @endforeach

                <input type="number" name="materi_id" id="materi_id" value="{{ $materi_id }}" hidden>

                </div>
                <div class="card-action">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"></h4>
                    <button class="btn btn-primary btn-round ml-auto" type="submit" >
                        Selesai
                    </button>
                </div>
                </div>
    </div>
            </form>
    </div>
</div>
@endsection



