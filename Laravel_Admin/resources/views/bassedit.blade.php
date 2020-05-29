@extends('master')

<!-- Fille the content -->
@section('konten')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Editing Bass Data
                </div>
                <div class="card-body">
                @if(count($errors)>0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div> 
                @endif
                    <form action="http://127.0.0.1:8080/UAS/public/bass/update" method="POST">
                    {{csrf_field()}}
                    @foreach($bass as $bass)
                    <input type="hidden" name="item_id" value="{{$bass->item_id}}"><br>
                        <div class="form-group">
                            <label for="inst_type">Bass type</label>
                            <select class="form-control" name="inst_type" id="inst_type" >
                                @foreach($bass_inst_type as $key)
                                    <option value="{{ $key }}" selected>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item_name">Bass Name</label>
                            <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Instrument Name" value=" {{$bass->item_name}}">
                        </div>
                        <div class="form-group">
                            <label for="color">Colour</label>
                            <select class="form-cotrol" name="color" id="color">
                            @foreach($bass_color as $key)
                                <option value="{{ $key }}" selected>{{ $key }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="spec">Specification</label>
                            <input type="text" name="spec" class="form-control" id="spec" placeholder="Speculation" value="{{$bass->spec}}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="{{$bass->price}}">
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning float-right">Submit</button> <a href="http://127.0.0.1:8080/UAS/public/bass" class="btn btn-danger">Go back</a>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection