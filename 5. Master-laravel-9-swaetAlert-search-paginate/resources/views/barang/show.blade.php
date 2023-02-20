@extends('layout\index')
@section('body')
<div class="card">
    <div class="card-header">
        haha <a class="btn btn-primary btn-sm float-end" href="/barang" role="button">Back</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <img src="/image/{{$barang->gambar}}" class="img-thumbnail" alt="...">
            </div>
            <div class="col">
                <div class="row mb-3">
                    <div class="col-3">Nama Barang</div>
                    <div class="col-1">:</div>
                    <div class="col-3">{{$barang->nama_barang}}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">Harga</div>
                    <div class="col-1">:</div>
                    <div class="col-3">{{"Rp " . number_format($barang->harga,2,',','.');}}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">Stok</div>
                    <div class="col-1">:</div>
                    <div class="col-3">{{$barang->stok}}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">Keterangan</div>
                    <div class="col-1">:</div>
                    <div class="col-3">{{$barang->keterangan}}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">Suplier</div>
                    <div class="col-1">:</div>
                    <div class="col-3">{{$barang->suplier->nama_suplier}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-grid gap-2 d-md-block text-center">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="/barang/edit/{{$barang->id}}" role="button">Edit</a>
                </div>
                <div class="col">
                    <form action="/barang/{{$barang->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>

@endsection