@extends('admin.main')
@section('body')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Yetki İşlemleri</h1>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card">
                @include('admin.include.permissions.list')
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    @include('admin.include.permissions.create')
    @include('admin.include.permissions.edit')
    @include('admin.include.permissions.delete')
@endsection
