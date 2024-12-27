@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="{{route('order_details.create')}}" class="btn btn-success">Thêm </a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã đơn hàng chi tiết</th>
                <th scope="col">Tên SP </th>
                <th scope="col">Ngày mua hàng </th>
                <th scope="col">trạng thái </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0;
                ?>
                @foreach ($order_details as $item)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item->order_id}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->order->order_date}}</td>
                    <td>
                        @if($item->order->status == 1)
                            đã thanh toán
                        @else
                            chưa thanh toán
                        @endif
                    </td>
                    <td>
                        <a type="button" class="btn btn-success" href ="{{route('order_details.show', $item->id)}}"><i class="bi bi-eye"></i></a>
                        <a type="button" class="btn btn-danger" href="{{route('order_details.edit', $item->id)}}"><i class="bi bi-pen"></i></a>
                        <form action="{{ route('order_details.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                          @csrf
                          @method('DELETE') <!-- Đảm bảo dòng này có mặt trong form -->
                          <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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
              $order_details->links('pagination::bootstrap-5')
            }}
          </div>
    </div>
    @include('order_details.destroy');
@endsection 