@extends('master')

<!-- Fille the content -->
@section('konten')
<div class="container">


<div class="row mt-3">
    <div class="col-md-6">
        <a href="http://127.0.0.1:8080/UAS/public/bassadd"class="btn btn-info">Add Instrument </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Instrument List</h2>
    <table class="table table-stripped table-dark">
        <tr>
            <th scope="col">Instrument Type</th>
            <th scope="col">Instrument Name</th>
            <th scope="col">Colour</th>
            <th scope="col">Spesification</th>
            <th scope="col">Price</th>
        </tr>
        @foreach($item as $itm)
            <tr> 
                <td>{{$itm->inst_type}}</td>
                <td>{{$itm->item_name}}</td>
                <td>{{$itm->color}}</td>
                <td>{{$itm->spec}}</td>
                <td>{{$itm->price}}</td>
                <td> <a href="http://127.0.0.1:8080/UAS/public/bass/hapus/{{$itm->item_id}}" class="badge badge-warning float-right" onclick="return confirm('Are you sure want to delete this data?')">Hapus</a></td>
                <td> <a href="http://127.0.0.1:8080/UAS/public/bass/edit/{{$itm->item_id}}" class="badge badge-light float-right">Edit</a></td>
                <td> <a href="http://127.0.0.1:8080/UAS/public/bass/detail/{{$itm->item_id}}" class="badge badge-info float-right">Detail</a></td>
            </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
</div>
</div>
@endsection