@extends('backend.layouts.app')
<!------ Include the above in your HEAD tag ---------->
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Gallery Update</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Gallery Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('gallery') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('gallery.update', $gallery->id) }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $gallery->title }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Description</label>
                                <textarea name="description"  class="form-control"
                                          placeholder="Write description here *" style="width: 100%; height: 80%;">{{$gallery->description}}</textarea>
                            </div>
                        </div>
                        
                        @if($gallery->image)
                            <div class="col-md-12">
                                <input type="file" id="image" class="btn btn-primary" name="image" accept="image/*">
                                @if($gallery->image)
                                            <img id="image_preview"
                                                 src="{{asset('images').'/'.$gallery->image }}" height="100px"
                                                 width="100px" style="float:right;">@endif
                            </div>
                            @else
                            <div class="col-md-12">
                                <input type="file" id="image" class="btn btn-primary" name="image" accept="image/*" required>
                            </div>
                            @endif
                            <br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success">Update</button>
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



