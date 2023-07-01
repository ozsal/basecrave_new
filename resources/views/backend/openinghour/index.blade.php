@extends('backend.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Opening Hour</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Opening Hour Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('openinghour.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add Opening Hour
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Opening Hour Table</h4>
                    {{--                    <h6 class="card-subtitle">Add class <code>.table</code></h6>--}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Day</th>
                                <th class="text-center">From Time</th>
                                <th class="text-center">Till Time</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($openinghours as $key => $row)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{$row->day}} </td>
                                <td class="text-center">{{$row->fromtime}} </td>
                                <td class="text-center">{{$row->totime}} </td>
                                <td class="text-center" width="15%">
                                    <a type="button" href="{{ route('openinghour.edit', $row->id) }}"
                                       class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>

                                    <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                    data-id="{{ $row->id }}"><i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#deleteButton', function () {
                let $deleteRow = $(this).closest('tr');
                let $openinghourid = $(this).attr('data-id');

                let url = '{{route('openinghour.destroy',123)}}';
                url = url.replace(123, $openinghourid);
                swal({
                    title: "Are you sure?",
                    text: "The deleted data cannot be obtained after being deleted",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            method: 'get',
                            success: function (res) {
                                if (res == "true") {
                                    swal("opening hour Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("opening hour did not delete !", {
                                        icon: "warning",
                                    });
                                }
                            }
                        })
                    }
                })
            })
        });
    </script>
@endsection
