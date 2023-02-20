@extends('layout.index')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">Data Suplier</div>
            <div class="col"> <a class="btn btn-primary btn-sm float-end" href="/suplier/create" role="button">Create</a></div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Suplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telp Suplier</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $index=1;
                @endphp
                @foreach ($supliers as $suplier)
                <tr>
                    <th scope="row">{{$index++}}</th>
                    <td>{{$suplier->nama_suplier}}</td>
                    <td>{{$suplier->alamat_suplier}}</td>
                    <td>{{$suplier->telp_suplier}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-2" > <a class="btn btn-primary btn-sm" href="/suplier/edit/{{$suplier->id}}" role="button">Edit</a></div>
                            <div class="col-md-2">
                                <form action="/suplier/{{$suplier->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </div>
                        </div>


                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection