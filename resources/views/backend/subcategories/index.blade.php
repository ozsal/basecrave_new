@extends('backend.layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Menu Sub Categories</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Menu Sub Categories Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('subcategories.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
               subcategories
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Menu Sub Categories Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Sub Categories Name</th>
                                <th class="text-center"> Short Description</th>
                                <th class="text-center"> Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategories as $key => $row)
                            <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">{{$row->subcategories_name}}</td>
                                    <td class="text-center">{{ $row->short_description }} </td>
                                    <td class="text-center" width="20%">@if($row->subcategories_image)
                                            <img id="image_preview"
                                                 src="{{asset('images/subcategories').'/'.$row->subcategories_image}}" height="100px"
                                                 width="100px">@endif
                                    </td>
                                    <td  width="15%">
                                        <a type="button" href="{{ route('subcategories.edit', $row->id) }}"
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
                let $subcategoriesId = $(this).attr('data-id');

                let url = '{{route('subcategories.destroy',123)}}';
                url = url.replace(123, $subcategoriesId);
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
                                    swal("Sub Categories Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Sub Categories did not delete !", {
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
