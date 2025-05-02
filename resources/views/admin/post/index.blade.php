@extends('admin.layouts.main')
@section('start-point')
    Quản lý bài viết
@endsection
@section('title')
    Danh sách bài viết
@endsection
@section('main')
<div class="container py-4">
    <h2 class="mb-4">Danh sách bài viết</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thành công!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Lỗi!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
      
    
        <div class="flex-shrink-0">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                <i class="ri-add-line align-bottom me-1"></i> Thêm mới bài viết
            </a>
        </div>
        <form method="GET" class="mb-2" style="margin-top: 20px;margin-bottom: 10px;">
            <select name="post_category_id" onchange="this.form.submit()" class="form-control w-auto d-inline-block">
                <option value="">-- Tất cả chuyên mục --</option>
                @foreach ($postCategories as $category)
                    <option value="{{ $category->id }}" {{ request('post_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th>STT</th>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Slug</th>
                <th>Trích đoạn</th>
                <th>Nội dung</th>
                <th>Chuyên mục</th>
                <th>Trạng thái</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($post->thumbnail)
                            <img src="{{ asset($post->thumbnail) }}" alt="Ảnh đại diện" width="80" class="rounded">
                        @else
                            Không có
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ Str::limit($post->excerpt, 50) }}</td>
                    <td>{!! Str::limit(strip_tags($post->content), 50) !!}</td>
                    <td>{{ $post->postCategory->name ?? 'Không rõ' }}</td>
                    <td>
                        @if ($post->status === 'published')
                            <span class="badge bg-success">Đã xuất bản</span>
                        @else
                            <span class="badge bg-warning text-dark">Bản nháp</span>
                        @endif
                    </td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-primary {
            background-color: #e9f7fc;
        }

        .table th {
            background-color: #f1f3f5;
            color: #495057;
        }

        .table td {
            background-color: #ffffff;
        }

        .table td img {
            border-radius: 8px;
        }

        .btn-danger {
            background-color: #f44336;
            border-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
            border-color: #e53935;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 120px;
        }

        .table tbody tr:hover {
            background-color: #e2e6ea;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }

        .alert {
            border-radius: 5px;
            font-size: 1rem;
        }

        .badge {
            font-size: 1rem;
            font-weight: 600;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var posts = @json($posts);
            new gridjs.Grid({
                columns: [
                    { name: "ID", hidden: true },
                    {
                        name: "Tiêu đề bài viết",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('admin.posts.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('admin.posts.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('admin.posts.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(`
                                <b>${param}</b>
                                <div class="d-flex mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                    <form action="${deleteUrl}" method="post" onsubmit="return confirm('Bạn có muốn xóa bài viết?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link p-0 text-danger">Xóa</button>
                                    </form>
                                </div>
                            `);
                        }
                    },
                    { name: "Tác giả" },
                    { name: "Chuyên mục" },
                    {
                        name: "Ngày đăng",
                        formatter: param => new Date(param).toLocaleDateString('vi-VN')
                    },
                    {
                        name: "Trạng thái",
                        formatter: function (status, row) {
                            const id = row.cells[0].data;
                            const statusMap = { draft: 'Bản nháp', published: 'Đã xuất bản' };
                            const colorClass = status === 'published' ? 'btn-success' : 'btn-warning';
                            return gridjs.html(`
                                <div class="btn-group btn-group-sm">
                                    <button class="btn ${colorClass}">${statusMap[status]}</button>
                                    <button type="button" class="btn ${colorClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${id}, 'draft')">Bản nháp</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${id}, 'published')">Đã xuất bản</a></li>
                                    </ul>
                                </div>
                            `);
                        }
                    }
                ],
                data: posts.map(post => [
                    post.id,
                    post.title,
                    post.author ? post.author.name : 'Chưa rõ',
                    post.post_category ? post.post_category.name : 'Chưa phân loại',
                    post.created_at,
                    post.status
                ]),
                pagination: { limit: 5 },
                sort: true,
                search: true
            }).render(document.getElementById("table-gridjs"));
        });

        function changeStatus(id, status) {
            if (!confirm('Bạn muốn thay đổi trạng thái bài viết?')) return;
            fetch(`/admin/posts/update-status/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status })
            })
            .then(response => response.json())
            .then(data => data.success ? location.reload() : alert('Cập nhật thất bại.'));
        }
    </script>
@endpush
