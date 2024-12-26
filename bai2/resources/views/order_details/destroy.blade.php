{{-- @extends('layouts.app')
@section('content')
<form action="{{ route('order_details.destroy', $order_details->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
    @csrf
    @method('DELETE')  <!-- Đảm bảo sử dụng phương thức DELETE -->
    <a type="button" class="btn btn-primary" href="{{route('order_details.destroy', $item->id)}}"><i class="bi bi-trash"></i></a>
</form>

@endsection --}}

