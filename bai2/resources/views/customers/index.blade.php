@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Tên khách hàng </th>
            <th scope="col">Dia chi </th>
            <th scope="col">SDT </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            ?>
            @foreach ($customers as $item)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
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
          $customers->links('pagination::bootstrap-5')
        }}
</div>
@endsection