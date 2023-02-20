@extends('layout\index')
@section('body')
<div class="card">
    <div class="card-header">ahaha</div>
    <div class="card-body">
        <form action="/barang/edit/{{$barang->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="namabarang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="namabarang" name="namabarang" value="{{@old('namabarang')?@old('namabarang'): $barang->nama_barang}}">
                @error('namabarang')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga"  value="{{@old('harga')?@old('harga'): $barang->harga}}">
                @error('harga')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok"  value="{{@old('stok')?@old('stok'): $barang->stok}}">
                @error('stok')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="suplier" class="form-label">Suplier</label>
                <select class="form-select" aria-label="Default select example" id="suplier" name="suplier" >
                    <option  value="{{$barang->suplier_id}}" selected>{{@old('suplier')?@old('suplier'): $barang->suplier->nama_suplier}}</option>
                    @foreach ($supliers as $suplier )
                    <option value="{{$suplier->id}}">{{$suplier->nama_suplier}}</option>
                    @endforeach
                </select>
                @error('suplier')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Example textarea</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"> {{@old('keterangan')?@old('keterangan'): $barang->keterangan}}</textarea>
                @error('keterangan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="gambar" name="gambar" multiple value="{{@old('gambar')?@old('gambar'): $barang->gambar}}">
                
                @error('gambar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if ( $barang->gambar)
                <img id="preview-image-before-upload" class="mt-3" src="/image/{{$barang->gambar}}" alt="preview image" style="max-height: 250px;">

                @else
                <img id="preview-image-before-upload" class="mt-3" src="/image/master/user.jpg" alt="preview image" style="max-height: 250px;">

                @endif

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#gambar').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@endsection