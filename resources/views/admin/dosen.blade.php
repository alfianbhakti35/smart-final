@extends('layouts.admin')
@section('admin')
<div class="page-inner">
<div class="page-header">
    <h4 class="page-title">Daftar Dosen</h4>
</div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"></h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Tambah Dosen
                </button>
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
                                Tambah</span>
                                <span class="fw-light">
                                    Dosen
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Silahkan Masukkan Data Dosen</p>
                            <form action="/admin/adddosen" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">NIDN</label>
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIDN">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Prodi</label>
                                            <select class="form-control" id="prodi" name="prodi">
                                                <option value=""><i>Pilih Prodi</i></option>
                                                @foreach ($prodi as $p)
                                                    <option value="{{ $p['id'] }}">{{ $p['nama'] }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th style="width: 50%">Nama</th>
                            <th >NIDN</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>NIDN</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            @if ($d['level'] === 'dosen')
                            <tr>
                                <td>{{ $d['nama'] }}</td>
                                <td>{{ $d['nim'] }}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
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

<script>
    //== Class definition
    var SweetAlert2Demo = function() {

        //== Demos
        var initDemos = function() {
            //== Sweetalert Demo 1
            $('#alert_demo_1').click(function(e) {
                swal('Good job!', {
                    buttons: {
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });
            });

            //== Sweetalert Demo 2
            $('#alert_demo_2').click(function(e) {
                swal("Here's the title!", "...and here's the text!", {
                    buttons: {
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });
            });

            //== Sweetalert Demo 3
            $('#alert_demo_3_1').click(function(e) {
                swal("Good job!", "You clicked the button!", {
                    icon : "warning",
                    buttons: {
                        confirm: {
                            className : 'btn btn-warning'
                        }
                    },
                });
            });

            $('#alert_demo_3_2').click(function(e) {
                swal("Good job!", "You clicked the button!", {
                    icon : "error",
                    buttons: {
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
            });

            $.notify(function(e) {
                swal("Good job!", "You clicked the button!", {
                    icon : "success",
                    buttons: {
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                });
            });

            $('#alert_demo_3_4').click(function(e) {
                swal("Good job!", "You clicked the button!", {
                    icon : "info",
                    buttons: {
                        confirm: {
                            className : 'btn btn-info'
                        }
                    },
                });
            });

            //== Sweetalert Demo 4
            $('#alert_demo_4').click(function(e) {
                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Confirm Me",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            });

            $('#alert_demo_5').click(function(e){
                swal({
                    title: 'Input Something',
                    html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "Input Something",
                            type: "text",
                            id: "input-field",
                            className: "form-control"
                        },
                    },
                    buttons: {
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        },
                        confirm: {
                            className : 'btn btn-success'
                        }
                    },
                }).then(
                function() {
                    swal("", "You entered : " + $('#input-field').val(), "success");
                }
                );
            });

            $('#alert_demo_6').click(function(e) {
                swal("This modal will disappear soon!", {
                    buttons: false,
                    timer: 3000,
                });
            });

            $('#alert_demo_7').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        swal({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            type: 'success',
                            buttons : {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
            });

            $('#alert_demo_8').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        cancel: {
                            visible: true,
                            text : 'No, cancel!',
                            className: 'btn btn-danger'
                        },
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!", {
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    }
                });
            })

        };

        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    }();

    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
@endsection
