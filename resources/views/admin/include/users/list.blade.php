<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <div class="addcart">
                <button data-bs-toggle="modal" data-bs-target="#addNewUser" id="addNewUserBtn"
                    class="btn btn-success fw-bold">
                    <i class="align-middle" data-feather="user-plus"></i>
                    Yeni
                    Kullanıcı Ekle</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="userstable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>Son Güncellenme Tarihi</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if ($user->avatar == 'default.png')
                            <td>
                                <img src="{{ asset('img/avatarupload/default.png') }}" width="48" height="48"
                                    class="rounded-circle me-2" alt="Avatar">
                            </td>
                        @else
                            <td>
                                <img src="{{ asset('img/avatarupload/' . $user->avatar) }}" width="48"
                                    height="48" class="rounded-circle me-2" alt="Avatar">
                            </td>
                        @endif


                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($user->created_at))) }}
                        </td>
                        <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($user->updated_at))) }}
                        </td>
                        <td class="table-action">
                            <a data-bs-toggle="modal" data-bs-target="#editUser" class="editBtn"
                                data-id={{ $user->id }}><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-edit-2 align-middle">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                    </path>
                                </svg></a>
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-trash align-middle">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                </svg></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
