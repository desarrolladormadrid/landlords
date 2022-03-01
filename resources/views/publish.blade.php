@extends('layouts.app')
@section( 'content')
<div class="container">
    <h2>Publish rent</h2>
    <div class="row container border border-secondary mt-4" style="align-items: center">
        <div class="col-md-12 pt-3">
            @if ($errors->any())
            <div class="alert alert-danger pb-0">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

            <form action="{{route('create')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label"><strong>Title: </strong></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title and description">
                    </div>
                    <p><strong>Landlord: </strong>{{auth()->user()->name}}</p>
                    <p><strong>Available: </strong>True</p>
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0"><strong>Features</strong></legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="hidden" name="air" id="air" value="0">
                                <input class="form-check-input" type="checkbox" name="air" id="air" value="1">
                                <label class="form-check-label" for="air">
                                    Air conditioning
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="hidden" name="heating" id="heating" value="0">
                                <input class="form-check-input" type="checkbox" name="heating" id="heating" value="2">
                                <label class="form-check-label" for="heating">
                                    Heating
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="hidden" name="elevator" id="elevator" value="0">
                                <input class="form-check-input" type="checkbox" name="elevator" id="elevator" value="3">

                                <label class="form-check-label" for="elevator">
                                    Elevator
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>



                <div class="text-center mb-2">
                    <button class="btn btn-success px-4">Send</button>
                </div>
            </form>

        </div>


    </div>
    @endsection
