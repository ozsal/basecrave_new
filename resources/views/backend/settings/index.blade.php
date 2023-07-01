@extends('backend.layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Settings</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Settings Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
        @if($settings->count() == 0)
            <a href="{{ route('settings.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                Settings
            </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Settings Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Tel No</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Footer Text</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $key => $row)
                            <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center" width="20%">@if($row->logo)
                                            <img id="image_preview" 
                                                 src="{{asset('images/logo').'/'.$row->logo}}" height="50px"
                                                 width="100">@endif
                                    </td>
                                    <td class="text-center">{{$row->gmail}}</td>
                                    <td class="text-center">{{ $row->phoneno }} </td>
                                    <td class="text-center">{{ $row->location }} </td>
                                    <td class="text-center">{{ $row->footer_text }} </td>
                                    <td width="15%">
                                        <a type="button" href="{{ route('settings.edit', $row->id) }}"
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
                let $introId = $(this).attr('data-id');

                let url = '{{route('settings.destroy',123)}}';
                url = url.replace(123, $introId);
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
                                    swal("Settings Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Settings did not delete !", {
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
