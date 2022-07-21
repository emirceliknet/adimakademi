@extends('admin.main')
@section('body')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Genel</strong> Görünüm</h1>

        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Kullanıcılar</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between my-3">
                                        <div class="limitcount">
                                            <h1 class="mt-1 mb-3 h4">Son <strong>{{ $users->count() }}</strong> kayıt</h1>
                                        </div>
                                        <div class="totalcount">
                                            <h1 class="mt-1 mb-3 h4">Toplam Kullanıcı Sayısı
                                                <strong>{{ $usercount }}</strong>
                                            </h1>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>İsim</th>
                                                <th>Email</th>
                                                <th>Oluşturulma Tarihi</th>
                                                <th>Son Güncellenme Tarihi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    @if ($user->avatar == 'default.png')
                                                        <td>
                                                            <img src="{{ asset('img/avatarupload/default.png') }}"
                                                                width="48" height="48" class="rounded-circle me-2"
                                                                alt="Avatar">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <img src="{{ asset('img/avatarupload/' . $user->avatar) }}"
                                                                width="48" height="48" class="rounded-circle me-2"
                                                                alt="Avatar">
                                                        </td>
                                                    @endif
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($user->created_at))) }}
                                                    </td>
                                                    <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($user->updated_at))) }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('users') }}" class="w-100 btn btn-primary">Tüm kaydı Görüntüle</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
