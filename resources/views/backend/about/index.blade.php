@extends('backend.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">About</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">About Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            @if($abouts->count() == 0)
                <a href="{{ route('about.create') }}"
                   class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Image</th>
                                <th class="text-center"></th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $key => $about)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $about->title }}</td>
                                    <td class="text-center" width="50%">{{ $about->description }} </td>

                                    <td class="text-center" width="20%">@if($about->image)
                                            <img id="image_preview"
                                                 src="{{asset('images').'/'.$about->image }}" height="100px"
                                                 width="100px">@endif</td>
                                    <td>
                                    <td class="text-center" width="15%">
                                        <a type="button" href="{{ route('about.edit', $about->id) }}"
                                           class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>

                                        <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                        data-id="{{ $about->id }}"><i class="fas fa-trash"></i>
                                        </button>
                                        <input type="hidden" name="service_id">
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
                let $aboutId = $(this).attr('data-id');

                let url = '{{route('about.destroy',123)}}';
                url = url.replace(123, $aboutId);
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
                                    swal("About Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("About did not delete !", {
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
