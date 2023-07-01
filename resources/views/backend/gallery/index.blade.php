@extends('backend.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Gallery</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Gallery Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('gallery.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add Gallery
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Our Gallery</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Image</th>
                                <th></th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gallerys as $key => $gallery)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ $gallery->title }}</td>
                                <td class="text-center">{{ $gallery->description }} </td>
                                    <td class="text-center" width="20%">@if($gallery->image)
                                            <img id="image_preview"
                                                 src="{{asset('images').'/'.$gallery->image }}" height="100px"
                                                 width="100px">@endif</td>
                                    <td>
                                <td class="text-center" width="15%">
                                    <a type="button" href="{{ route('gallery.edit', $gallery->id) }}"
                                       class="btn btn-xs btn-primary"><i class="fas fa-pen"></i> Edit</a>

                                    <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                    data-id="{{ $gallery->id }}">
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
                let $galleryId = $(this).attr('data-id');

                let url = '{{route('gallery.destroy',123)}}';
                url = url.replace(123, $galleryId);
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
                                    swal("Gallery Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Gallery did not delete !", {
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
