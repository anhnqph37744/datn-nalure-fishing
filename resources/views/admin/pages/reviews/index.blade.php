@extends('admin.layouts.main')

@section('main')
    <div class="main">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Danh sách đánh giá sản phẩm</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>

                    <li class="active">
                        <strong>Danh sách đánh giá sản phẩm</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Người đánh giá</th>
                                    <th>Nội dung</th>
                                    <th>Rating</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->product->name ?? 'N/A' }}</td>
                                        <td>{{ $review->user->name ?? 'Ẩn danh' }}</td>
                                        <td>{{ $review->review }}</td>
                                        <td>{{ $review->rating }} ★</td>
                                        <td>{{ $review->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('admin.reviews.toggle', $review->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <label class="custom-switch">
                                                    <input type="checkbox" class="custom-toggle" {{ $review->is_active ? 'checked' : '' }}>
                                                    <span class="custom-slider"></span>
                                                </label>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $reviews->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
