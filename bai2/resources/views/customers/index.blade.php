@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('customers.create')}}" class="btn btn-success">Thêm khách hàng</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 15%;">Mã khách hàng</th>
            <th scope="col" style="width: 10%;">Tên khách hàng</th>
            <th scope="col" style="width: 25%;">Địa chỉ</th>
            <th scope="col" style="width: 15%;">SĐT</th>
            <th scope="col" style="width: 20%;">Email</th>
            <th scope="col" style="width: 15%;">Hành động</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            ?>
            @foreach ($customers as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <a class="btn btn-warning"><i class="bi bi-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php 
            ?>
            @endforeach
          
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{
          $customers->links('pagination::bootstrap-4')
        }}
</div>
@endsection