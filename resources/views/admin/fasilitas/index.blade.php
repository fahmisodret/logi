@extends('admin.layout.index')

@section('content')
<div class="col-md-12 card">
  <div class="box box-primary">
    <div class="box-header with-border">
        <br/>
        <div class="col-md-6">
            <h3 class="box-title">Data Fasilitas</h3>
        </div>
        <div class="col-md-6">
            <a href="{{url("admin/fasilitas/create")}}" class="btn btn-success btn-sm">Tambah</a> 
        </div>
    </div>
    <div class="box-body">
        <hr style="margin: 10px 0 15px 0">
        <table class="table table-hover table-striped" id="table_user">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if(count($data) <= 0)
                <tr>
                    <td colspan="5">Data Kosong</td>
                <tr>
                @endif
                @foreach($data as $item)
                <tr>
                    <td>{{$item->image}}</td>
                    <td>{{$item->name}}</td>
                    <td><div style="text-align:center">
                        <a href="{{url("admin/fasilitas/edit/".$item->id)}}" class="btn btn-warning btn-xs">Ubah</a> 
                        <a href="{{url("admin/fasilitas/destroy/".$item->id)}}" class="btn btn-danger btn-xs">Hapus</a> 
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
