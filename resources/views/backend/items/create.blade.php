@extends('backend.layouts.app')
<!------ Include the above in your HEAD tag ---------->
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Menu Items Create</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Menu Items Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('items') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('items.store') }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Menu Item Name</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Sub Category</label>
                                <select name="subcategories_id" id="subcategories" class="form-control">
                                    @foreach($subcategories as $row)
                                   <option value="{{$row->id}}">{{$row->subcategories_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Description</label>
                                <textarea name="description"  class="form-control"
                                          placeholder="Write description here *" style="width: 100%; height: 80%;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Menu Item Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12" for="img">Select Item Image:</label>
                            <div class="col-md-12">
                                <input type="file" id="image" class="btn btn-primary" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#description').ckeditor({})
    </script>
@endsection



