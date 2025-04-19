@extends('admin.layouts.main')
@section('start-point')
    Quản lý danh mục bài viết
@endsection
@section('title')
    Danh sách danh mục bài viết
@endsection
@section('main')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm danh mục bài viết</h5>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong class="fs-5 text-uppercase">⚠ Vui lòng nhập đầy đủ thông tin!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                            
                    
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="{{ route('admin.post-categories.store') }}" method="post">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên danh mục</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Slug</label>
                                <input class="form-control @error('slug') is-invalid @enderror" name="slug"
                                    type="text" value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .is-invalid {
            border-color: #dc3545 !important; 
        }
    
        .invalid-feedback {
            color: #dc3545;
            font-weight: 500;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <script>
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
                    formatter: function(cell, row) {
                        let id = row.cells[0].data;
                        let sua = `{{ route('admin.post-categories.edit', ':id') }}`.replace(':id', id);
                        let xoa = `{{ route('admin.post-categories.destroy', ':id') }}`.replace(':id', id);
                        let csrfToken = '{{ csrf_token() }}';
                        return gridjs.html(`
                        <a href="${sua}" class="btn btn-link">Sửa</a> |
                        <form action="${xoa}" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    `);
                    }
                }
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                @foreach ($categories as $category)
                    [
                        '{{ $category->id }}',
                        '{{ $category->name }}',
                        '{{ $category->slug }}',
                        '{{ $category->description }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));
    </script>

    <style>
        
        .status-an {
            background-color: red;
            color: #fff;
        }

        .status-hien {
            background-color: green;
            color: #fff;
        }

        .status-an .dropdown-menu {
            background-color: red;
        }

        .status-hien .dropdown-menu {
            background-color: green;
        }

        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .dropdown-toggle-split::after {
            display: none;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 100px;
        }
    </style>
@endpush
