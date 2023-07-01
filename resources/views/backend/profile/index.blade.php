@extends('backend.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Profile</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile Page</li>
            </ol>
        </div>
        @if($profiles->count() == 0)
        <div class="col-md-7 align-self-center">
            <a href="{{ route('profile.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add Profile
            </a>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile Table</h4>
                    {{--                    <h6 class="card-subtitle">Add class <code>.table</code></h6>--}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Favicon</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($profiles as $key => $profile)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">@if($profile->favicon)
                                            <img id="image_preview"
                                                 src="{{asset('images/profile').'/'.$profile->favicon }}" height="100px"
                                                 width="100px">@endif
                                </td>
                                <td class="text-center" width="15%">
                                    <a type="button" href="{{ route('profile.edit', $profile->id) }}"
                                       class="btn btn-xs btn-primary"><i class="fas fa-pen"></i> Edit</a>

                                    <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                    data-id="{{ $profile->id }}">
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
                let $profileId = $(this).attr('data-id');

                let url = '{{route('profile.destroy',123)}}';
                url = url.replace(123, $profileId);
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
                                    swal("Favicon Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Favicon did not delete !", {
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
