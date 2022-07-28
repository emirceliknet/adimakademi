@extends('admin.main')
@section('body')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Kullanıcı İşlemleri</h1>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card">
                @include('admin.include.users.list')
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    @include('admin.include.users.show')
    @include('admin.include.users.create')
    @include('admin.include.users.edit')
    @include('admin.include.users.delete')
@endsection
