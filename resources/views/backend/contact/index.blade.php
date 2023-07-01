@extends('backend.layouts.app')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Contact</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Contact Page</li>
            </ol>
        </div>
        @if($contacts->count() == 0)
        <div class="col-md-7 align-self-center">
            <a href="{{ route('contact.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                Contact
            </a>
        </div>
            @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Mobile Number</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($contacts as $key => $contact)
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $contact->email }} </td>
                                    <td class="text-center">{{ $contact->address }} </td>
                                    <td class="text-center">{{ $contact->mobNumber }} </td>
                                    <td class="text-center" width="15%">
                                        <a type="button" href="{{ route('contact.edit', $contact->id) }}"
                                           class="btn btn-xs btn-primary"><i class="fas fa-pen"></i> Edit</a>

                                        <button type="button" class="delete btn btn-xs btn-danger" id="deleteButton"
                                                data-id="{{$contact->id}}">
                                            Delete
                                        </button>
                                    </td>
                                @endforeach
                            </tr>
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
                let $contactId = $(this).attr('data-id');

                let url = '{{route('contact.destroy',123)}}';
                url = url.replace(123, $contactId);
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
                                    swal("Contact Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Contact did not delete !", {
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
