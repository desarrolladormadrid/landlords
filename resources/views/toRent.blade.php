@extends('layouts.app')

@section('content')

<div class="container">
    <!--block list-->
    <h2>Request to rent</h2>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row container border border-secondary mt-4" style="align-items: center">
        <div class="col-md-12 pt-3">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p><strong>Title: </strong>{{ $apartament->title }}</p>
            <p><strong>Landlord: </strong>{{$apartament->user->name}}</p>
            <p><strong>Available: </strong>{{ $apartament->available==1?'True':'False'}}</p>
        </div>
    </div>
    <!--end block list-->
    @if(!session()->has('message'))

    <div class="mt-4">
        <form method="post" action="{{route('toRent',$apartament->id)}}">
            @csrf
            <div class="form-group row">
                <div class="row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="mt-4 row ">
                    <label for="date" class="col-sm-2 col-form-label">Birthdate</label>
                    <div class="col-sm-9">
                        <input type="text" name="date" value="YYYY/MM/DD">
                    </div>
                </div>
            </div>
            <div class="offset-md-3 mt-4">
                <button class="btn btn-outline-dark px-5 py-2" type="submit">Submit</button>
            </div>
            <input type="hidden" name="id_apartament" id="id_apartament" value="{{$apartament->id}}">
        </form>
    </div>
    @endif
</div>


@endsection
