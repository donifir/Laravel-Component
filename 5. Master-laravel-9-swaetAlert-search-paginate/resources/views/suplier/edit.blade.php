@extends('layout.index')

@section('body')
<div class="card">
    <div class="card-header">Create <a class="btn btn-primary btn-sm float-end" href="/suplier" role="button">Back</a></div>
    
    <div class="card-body">
        <form action="/suplier/edit/{{$suplier->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="namasuplier" class="form-label">Nama Suplier</label>
                <input type="text" class="form-control" id="namasuplier" name="namasuplier" value="{{ @old('namasuplier') ? @old('namasuplier') :$suplier->nama_suplier }}">

                @error('namasuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamatsuplier" class="form-label">Nama Suplier</label>
                <input type="text" class="form-control" id="alamatsuplier" name="alamatsuplier" value="{{ @old('alamatsuplier') ? @old('alamatsuplier') :$suplier->alamat_suplier }}" >

                @error('alamatsuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="telpsuplier" class="form-label">Telp Suplier</label>
                <input type="text" class="form-control" id="telpsuplier" name="telpsuplier"  value="{{ @old('telpsuplier') ? @old('telpsuplier') :$suplier->telp_suplier }}">

                @error('telpsuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection