@extends('backend.layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Media</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Media Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('media.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                Media
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Media Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Short Description</th>
                                <th class="text-center">Media Link</th>
                                <th class="text-center">Image</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medias as $key => $media)
                            <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">{{$media->title}}</td>
                                    <td class="text-center" width="20%">{{ $media->short_description }} </td>
                                    <td class="text-center">{{ $media->media_link }} </td>
                                    <td class="text-center" width="20%">@if($media->image)
                                            <img id="image_preview"
                                                 src="{{asset('images/media').'/'.$media->image }}" height="100px"
                                                 width="100px">@endif</td>
                                    <td>
                                    <td class="text-center" width="15%">
                                        <a type="button" href="{{ route('media.edit', $media->id) }}"
                                           class="btn btn-xs btn-primary"><i class="fas fa-pen"></i> Edit</a>

                                        <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                        data-id="{{ $media->id }}">
                                            Delete
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
                let $mediaid = $(this).attr('data-id');

                let url = '{{route('media.destroy',123)}}';
                url = url.replace(123, $mediaid);
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
                                    swal("Media Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Media did not delete !", {
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
