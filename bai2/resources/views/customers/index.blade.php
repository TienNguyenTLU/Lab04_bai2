@extends('layouts.app')
@section('content')
  <div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{route('customers.create')}}" class="btn btn-success">Thêm khách hàng</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 15%;">Mã khách hàng</th>
            <th scope="col" style="width: 15%;">Tên khách hàng</th>
            <th scope="col" style="width: 25%;">Địa chỉ</th>
            <th scope="col" style="width: 15%;">Số điện thoại</th>
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
                    <a class="btn btn-warning" href="{{ route('customers.edit', $item->id)}}"><i class="bi bi-pen"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" onclick="setDeleteAction('{{ route('customers.destroy', $item->id)}}')">
                      <i class="bi bi-trash"></i>
                    </button>
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

@include('customers.destroy');
@endsection

<script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
    }
</script>