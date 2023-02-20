@extends('layout.index')

@section('body')
<div class="card">
    <div class="card-header">Create <a class="btn btn-primary btn-sm float-end" href="/suplier" role="button">Back</a></div>
    
    <div class="card-body">
        <form action="/suplier/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namasuplier" class="form-label">Nama Suplier</label>
                <input type="text" class="form-control" id="namasuplier" name="namasuplier">

                @error('namasuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamatsuplier" class="form-label">Nama Suplier</label>
                <input type="text" class="form-control" id="alamatsuplier" name="alamatsuplier">

                @error('alamatsuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="telpsuplier" class="form-label">Telp Suplier</label>
                <input type="text" class="form-control" id="telpsuplier" name="telpsuplier">

                @error('telpsuplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection