@extends('admin.layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header">
                <h4 class="card-title ">EDIT DATA PASIEN</h4>
              </div>
            <div class="card-body">
                <form action="{{ route('pasien-update', $data->id) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    @method('put')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="" value="{{ $data->nama_pasien}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Country</label>
                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" placeholder="" value="{{ $data->alamat_pasien}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">City</label>
                    <input type="text" class="form-control" id="umur_pasien" name="umur_pasien" placeholder="" value="{{ $data->umur_pasien}}">
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class=""></i> Update
                  </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection