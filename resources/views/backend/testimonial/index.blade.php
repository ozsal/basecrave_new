@extends('backend.layouts.app')
<style>
    div.a {
        white-space: nowrap;
        width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        border: 1px solid #000000;
    }

    div.a:hover {
        overflow: visible;
    }
</style>

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Testimonial</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Testimonial Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('testimonial.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add Testimonial
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Testimonial Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $key => $testimonial)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">{{ $testimonial->customer_name }}</td>
                                    <td class="text-center" class="a">{{ $testimonial->description }} </td>
                            
                                    <td class="text-center" width="15%">
                                        <a type="button" href="{{ route('testimonial.edit', $testimonial->id) }}"
                                           class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>

                                        <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                        data-id="{{ $testimonial->id }}"><i class="fas fa-trash"></i>
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
                let $testimonialId = $(this).attr('data-id');

                let url = '{{route('testimonial.destroy',123)}}';
                url = url.replace(123, $testimonialId);
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
                                    swal("Testimonial Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Testimonial did not delete !", {
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
