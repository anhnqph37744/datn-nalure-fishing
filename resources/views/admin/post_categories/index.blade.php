@extends('admin.layouts.main')

@section('start-point')
    Quản lý danh mục bài viết
@endsection

@section('title')
    Danh sách danh mục bài viết
@endsection

@section('main')
<h1 class="text-xl font-bold mb-4">Danh mục bài viết</h1>
<div class="flex-shrink-0">
    <a href="{{ route('admin.post-categories.create') }}" class="btn btn-success"><i
            class="ri-add-line align-bottom me-1"></i> Thêm mới danh mục</a>
</div>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Tên danh mục</th>
            <th class="border px-4 py-2">Slug</th>
            <th class="border px-4 py-2">Mô tả</th>
            <th class="border px-4 py-2">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->id }}</td>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td class="border px-4 py-2">{{ $category->slug }}</td>
                <td class="border px-4 py-2">{{ $category->description }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.post-categories.edit', $category->id) }}"
                            class="btn btn-primary">Sửa</a>

                        <form action="{{ route('admin.post-categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này không?'); "
                            class="d-inline-block m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>

                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách danh mục bài viết</h4>
                </div>
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

{{-- @push('scripts')
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <script>
        function renderActions(id) {
            const editUrl = `{{ route('dashboard.post-categories.edit', ':id') }}`.replace(':id', id);
            const deleteUrl = `{{ route('dashboard.post-categories.destroy', ':id') }}`.replace(':id', id);
            const csrfToken = '{{ csrf_token() }}';

            return gridjs.html(`
                <a href="${editUrl}" class="btn btn-sm btn-light" title="Sửa">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="${deleteUrl}" method="POST" style="display:inline;">
                    <input type="hidden" name="_token" value="${csrfToken}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm btn-light text-danger" title="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            `);
        }

        const categoryData = {!! json_encode(
            $categories->map(function ($category) {
                    return [
                        $category->id,
                        $category->name,
                        $category->slug,
                        \Illuminate\Support\Str::limit($category->description, 80),
                    ];
                })->values()->toArray(),
        ) !!};

        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                    name: "ID",
                    hidden: true
                },
                {
                    name: "Tên danh mục"
                },
                {
                    name: "Slug"
                },
                {
                    name: "Mô tả"
                },
                {
                    name: "Hành động",
                    formatter: (_, row) => renderActions(row.cells[0].data)
                }
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: categoryData
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush --}}
