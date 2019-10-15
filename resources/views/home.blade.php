@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
        @include('inc.status.err_success')

        </div>
        <div class="col-md-6">
            <!-- <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> -->
            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST">
                @csrf
                <input class="form-control mr-sm-2" type="text" name="ticno" placeholder="Enter TIC no/Emp. Code" aria-label="Download"  autofocus>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Download</button>
            </form>
        </div>
    </div>
</div>
@endsection