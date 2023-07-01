@extends('backend.layouts.app')
<!------ Include the above in your HEAD tag ---------->
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
            <h3 class="text-themecolor">Banner Create</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Banner Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('banner') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('banner.update', $banner->id) }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $banner->title }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12" >Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          placeholder="Write description here *" style="width: 100%; height: 80%;" required>{{ $banner->description }}</textarea>
                            </div>
                        </div>
                        @if($banner->image)
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*">
                                @if($banner->image)
                                            <img id="image_preview"
                                                 src="{{asset('images/banner').'/'.$banner->image }}" height="100px"
                                                 width="100px" style="float:right;">@endif
                            </div>
                            @else
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="image" accept="image/*">
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
        $('textarea').keyup(function() {
  $("p").html(this.value.replace(/\n/g, '<br/>'));
});
       
    </script>
@endsection



