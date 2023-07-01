@extends('backend.layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Menu Items</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Menu Items Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('items.create') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Add
                Items
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Menu Items Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">S.N</th>
                                <th class="text-center">Menu Item Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Is Special?</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $row)
                            <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">{{ $row->title }} </td>
                                    <td class="text-center">{{ $row->description }} </td>
                                    <td class="text-center">{{ $row->price }} </td>
                                    <td class="text-center" width="20%">@if($row->image)
                                            <img id="image_preview"
                                                 src="{{asset('images/items').'/'.$row->image}}" height="100px"
                                                 width="100px">@endif
                                    </td>
                                    <td class="text-center">{{ $row->is_special }} </td>
                                    <td width="15%" >
                                        @if($row->is_special == 'yes')
                                        <button type="button" class="btn btn-xs btn-secondary" data-id="{{$row->id}}" id="changestatusid" value="no"><i class="fas fa-thumbs-up"></i></button>
                                        @else
                                        <button type="button" class="btn btn-xs btn-secondary" data-id="{{$row->id}}" id="changestatusid" value="yes"><i class="fas fa-thumbs-down"></i></button>
                                        @endif   
                                        <a type="button" href="{{ route('items.edit', $row->id) }}"
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
                let $itemsId = $(this).attr('data-id');

                let url = '{{route('items.destroy',123)}}';
                url = url.replace(123, $itemsId);
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
                                    swal("Menu Items Successfully deleted!", {
                                        icon: "success",
                                    });
                                    $deleteRow.remove();
                                } else {
                                    swal("Menu Items did not delete !", {
                                        icon: "warning",
                                    });
                                }
                            }
                        })
                    }
                })
            });



            $(document).on('click','#changestatusid', function(){
                var id = $(this).data('id');
                var statusvalue = $(this).val();
                var url = '{{route('items.changestatus',123)}}';
                url = url.replace(123, id);

                $.get(url,{id:id,statusvalue:statusvalue}, function(data){
                    if(data.type == 'success'){
                        alert('Status Changed Successfully');
                        location.reload();
                    }
                })

            });



        });
    </script>
@endsection
