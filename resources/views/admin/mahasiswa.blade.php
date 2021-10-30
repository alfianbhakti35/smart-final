@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Mahasiswa</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Import Mahasiswa
                </button>
                <a class="btn btn-primary btn-round ml-1" href="/admin/formatinfortmahasiswa">
                    <i class="fa fa-download"></i>
                    Format Import
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                New</span>
                                <span class="fw-light">
                                    Row
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                            <form action="/admin/importmahasiswa" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">File Excel Mahasiswa</label>
                                    <input type="file" class="form-control-file" id="file" name="file">
                                </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 50%">Nama</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Nim</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                        @if ($d['level'] === 'mahasiswa')
                        <tr>
                            <td>{{ $d['nama'] }}</td>
                            <td>{{ $d['username'] }}</td>
                            <td>{{ $d['prodi'] }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endif
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
