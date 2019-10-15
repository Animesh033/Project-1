@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as Admin!
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
        @include('inc.status.err_success')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.importexcel') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <label class="" for="customFile">Choose excel or csv file</label>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="customFile" placeholder="Choose excel or cvs file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                
                <div class="py-4">
                    <button type="submit" class="btn btn-primary form">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.storetic') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label class="" for="customFile2">Upload pdf files</label>
                <div class="custom-file">
                    <input type="file" name="filename[]" class="custom-file-input" id="customFile2" placeholder="Upload pdf files..." multiple>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                
                <div class="py-4">
                    <button type="submit" class="btn btn-primary form">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="photoGallery">
        <img src="{{ asset('img/img1.jpeg') }}">
        <img src="{{ asset('img/img2.jpeg') }}">
        <img src="{{ asset('img/img3.jpeg') }}">         
        <img src="{{ asset('img/img4.jpeg') }}">
        <img src="{{ asset('img/img5.jpeg') }}">
    </div> -->

    <!-- <div class="docScroller">
        <div class="page">Page 1</div>
        <div class="page">Page 2</div>
        <div class="page">Page 3</div>
        <div class="page">Page 4</div>
    </div> -->
    
</div>

@endsection
