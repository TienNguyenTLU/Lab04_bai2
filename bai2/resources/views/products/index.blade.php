@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Mô tả</th>
                <th scope="col">đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0;
                ?>
                @foreach ($products as $item)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->id}}</td>
                    <td>{{$item ->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>
                  <?php 
                $i++;
                ?>
                @endforeach
              
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{
              $products->links('pagination::bootstrap-5')
            }}
    </div>
@endsection 
