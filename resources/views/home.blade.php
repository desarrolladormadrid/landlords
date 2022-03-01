@extends('layouts.app')

@section('content')
<div class="container">
    <div class="border border-secondary mt-4 col-8 offset-md-2">
        <h3 class="m-4">Filters</h3>
        <div class="form-check form-check-inline mx-4 mb-4">
            @if (@$air > 0)
            <input class="form-check-input" type="checkbox" name="air" id="air" value="air" checked />
            @else
            <input class="form-check-input" type="checkbox" name="air" id="air" value="air" />
            @endif
            <label class="form-check-label" for="air"> Air conditioning</label>
        </div>
        <div class="form-check form-check-inline">
            @if (@$heating > 0)
            <input class="form-check-input" type="checkbox" name="heating" id="heating" value="heating" checked />
            @else
            <input class="form-check-input" type="checkbox" name="heating" id="heating" value="heating" />
            @endif
            <label class="form-check-label" for="heating"> Heating </label>
        </div>
        <div class="form-check form-check-inline">
            @if (@$elevator > 0)
            <input class="form-check-input" type="checkbox" name="elevator" id="elevator" value="elevator" checked />
            @else
            <input class="form-check-input" type="checkbox" name="elevator" id="elevator" value="elevator" />
            @endif
            <label class="form-check-label" for="elevator"> Elevator</label>
        </div>
        <button class="btn btn-primary" onclick="filter()">Filter</button>
    </div>
    <!--block list-->
    @if (isset($data))
    @foreach ($data as $item)
    <div class="row container border border-secondary mt-4" style="align-items: center">
        <div class="col-md-9 pt-3">
            <p><strong>Title: </strong>{{ $item->title }}</p>
            <p><strong>Landlord: </strong>{{ $item->user->name }}</p>
            <p><strong>Available: </strong>{{ $item->available == 1 ? 'True' : 'False' }}</p>
        </div>
        <div class="col-md-3">
            @if ($item->available == 1)
            <a class="btn btn-outline-dark px-4 py-2" href="{{ route('requestRent', $item->id) }}">Request to
                rent</a>
            @else
            <a class="btn btn-outline-dark px-4 py-2 disabled" disabled>Not available</a>
            @endif
        </div>
    </div>
    @endforeach
    <div class="text-center mt-4 row justify-content-center">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
    @endif
    <!--end block list-->
</div>
<script>
    $(document).ready(function() {
        let checkAir = $('#air');
        let checkHeating = $('#heating').val();
        let checkElevator = $('#elevator').val();
    });

    function filter() {
        let air = 0;
        let heating = 0;
        let elevator = 0;
        if ($('#air').prop('checked')) {
            air = 1;
        }
        if ($('#heating').prop('checked')) {
            heating = 2
        }
        if ($('#elevator').prop('checked')) {
            elevator = 3;
        }
        location.href = "./filter?air=" + air + "&heating=" + heating + "&elevator=" + elevator;
    }

</script>
<style>
    .pagination {
        justify-content: center;
    }

</style>

@endsection
