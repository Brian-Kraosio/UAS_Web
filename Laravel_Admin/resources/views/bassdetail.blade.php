@extends('master')

<!-- Fille the content -->
@section('konten')

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Bass Details
                </div>
                @foreach($bass as $bass)
                <div class="card-body">
                    <h5 class="card-title">{{ $bass->item_name }}</h5>
                    <p class="card-text">
                        <label for=""><b>Instrument Type</b> : </label>
                        {{ $bass->inst_type }}
                    </p>
                    <p class="card-text">
                        <label for=""><b>Color</b> : </label>
                        {{ $bass->color }}
                    </p>
                    <p class="card-text">
                        <label for=""><b>Spesification</b> : </label>
                        {{ $bass->spec }}
                    </p>
                    <p class="card-text">
                        <label for=""><b>Price</b> : Rp.</label>
                        {{ $bass->price }} 
                    </p>
                    <a href="http://127.0.0.1:8080/UAS/public/bass" class="btn btn-info">Go back</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection