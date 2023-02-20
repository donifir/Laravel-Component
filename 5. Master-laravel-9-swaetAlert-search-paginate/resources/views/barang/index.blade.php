@extends('layout\index')
@section('body')
<div class="card">
    <div class="card-header">List Barang <a class="btn btn-primary btn-sm float-end" href="/barang/create" role="button">Create</a></div>
    <div class="card-body">
        <form action="/barang" method="GET" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" id="search" name="search"></div>
                    <div class="col-1"><input type="submit" value="CARI" class="btn btn-primary float-end"></div>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Suplier</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $index=1;
                @endphp
                @foreach ($barangs as $barang )
                <tr>
                    <th scope="row">{{$index++}}</th>
                    <td> {{$barang->nama_barang}}</td>
                    <td>{{$barang->harga}}</td>
                    <td>{{$barang->suplier->id}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/barang/{{$barang->id}}" role="button">Detail</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
{{ $barangs->links("pagination::bootstrap-5") }}
@endsection