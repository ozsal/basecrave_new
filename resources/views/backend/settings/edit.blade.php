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
            <h3 class="text-themecolor">Settings Update</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Settings Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('settings') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('settings.update', $settings->id) }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf

                       
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">E-mail Address:</label>
                                <input type="text" name="email" class="form-control" value="{{$settings->gmail}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Tel Number:</label>
                                <input type="text" name="telno" class="form-control" value="{{$settings->phoneno}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Facebook Link</label>
                                <input type="text" name="fb_link" class="form-control" value="{{$settings->facebook_link}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Instagram Link</label>
                                <input type="text" name="insta_link" class="form-control" value="{{$settings->insta_link}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Twitter Link</label>
                                <input type="text" name="twitter_link" class="form-control" value="{{$settings->twitter_link}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Linkedin LInk</label>
                                <input type="text" name="linkedin_link" class="form-control" value="{{$settings->linkedin_link}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Address</label>
                                <input type="text" name="address" class="form-control" value="{{$settings->location}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Embed Map Link</label>
                                <input type="text" name="map_link" class="form-control" value="{{$settings->map_link}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Footer Text</label>
                                <input type="text" name="footer_text" class="form-control" value="{{$settings->footer_text}}">
                            </div>
                        </div>
                        @if($settings->logo)
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="logo" accept="image/*">
                                @if($settings->logo)
                                            <img id="image_preview"
                                                 src="{{asset('images/logo').'/'.$settings->logo }}" height="100px"
                                                 width="100px" style="float:right;">@endif
                            </div>
                            @else
                            <div class="col-md-12">
                                <input type="file" id="logo" class="btn btn-primary" name="logo" accept="image/*" required>
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



