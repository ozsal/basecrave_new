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
            <h3 class="text-themecolor">Contact Create</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact Page</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="{{ route('contact') }}"
               class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" style="float: right"> Go Back
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('contact.update', $contact->id) }}"
                          class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $contact->address }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Mobile Number</label>
                                <input type="number" name="mobNumber" class="form-control" value="{{ $contact->mobNumber }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Other Number&nbsp;<span>(Optional*)</span></label>
                                <input type="number" name="telNumber" class="form-control" value="{{ $contact->telNumber }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Facebook Link&nbsp;<span>(Optional*)</span></label>
                                <input type="url" name="fb_link" class="form-control" value="{{ $contact->fb_link }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Instagram Link&nbsp;<span>(Optional*)</span></label>
                                <input type="url" name="insta_link" class="form-control" value="{{ $contact->insta_link }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Linkedin Link&nbsp;<span>(Optional*)</span></label>
                                <input type="url" name="linkedin_link" class="form-control" value="{{ $contact->linkedin_link }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Twitter Link&nbsp;<span>(Optional*)</span></label>
                                <input type="url" name="twitter_link" class="form-control" value="{{ $contact->twitter_link }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Maps&nbsp;<span>(Optional*)</span></label>
                                <textarea type="url" name="map_link" class="form-control" placeholder="Go to maps.google.com,select your location and click on share then copy link and paste here"></textarea>
                            </div>
                        </div>
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



