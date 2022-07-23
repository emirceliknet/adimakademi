@extends('admin.main')
@section('body')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Rol İşlemleri</h1>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card">
                @include('admin.include.roles.list')
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    @include('admin.include.roles.create')
    @include('admin.include.roles.edit')
@endsection
