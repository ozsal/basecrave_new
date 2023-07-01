@extends('backend.layouts.app')
<style>
    textarea.form-control {
    width: 100%;
    height: 200px!important;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
    }
    </style>

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Banner</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Banner Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
                <a href="{{ route('banner.create') }}"
                   class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banner Table</h4>
                    <h6 style="color:red">Note: Please add image on the first row to change banner image on home page.</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Banner Image</th>
                                <th></th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $key => $banner)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center" width="20%">@if($banner->image)
                                            <img id="image_preview"
                                                 src="{{asset('images/banner').'/'.$banner->image}}" height="100px"
                                                 width="100px">@endif</td>
                                    <td>
                                    <td class="text-center" width="30%">{{ $banner->title }}</td>
                                    <td class="text-center" width="30%%"><p style="white-space: pre-line">{{ $banner->description }}</p> </td>

                                    <td class="text-center" width="15%">
                                        <a type="button" href="{{ route('banner.edit', $banner->id) }}"
                                           class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>

                                        <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                        data-id="{{ $banner->id }}"><i class="fas fa-trash"></i>
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
                let $bannerId = $(this).attr('data-id');

                let url = '{{route('banner.destroy',123)}}';
                url = url.replace(123, $bannerId);
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
                                    swal("Banner Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Banner did not delete !", {
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
