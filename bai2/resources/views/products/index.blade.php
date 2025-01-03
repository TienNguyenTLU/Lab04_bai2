@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="{{route('products.create')}}" class="btn btn-success">ADD</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Mô tả</th>
                <th scope="col">đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col" style="width: 20%;">Action</th>
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
                    <a type="button" class="btn btn-warning" href="{{route('products.edit', $item->id)}}"><i class="bi bi-pen"></i></a>
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
            <i class="bi bi-trash"></i>
        </button>
    </form>
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
              $products->links('pagination::bootstrap-4')
            }}
  </div>
  @endsection