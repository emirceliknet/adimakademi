@extends('admin.main')
@section('body')
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Kullanıcı İşlemleri</h1>
        </div>
        <div class="col-12 col-xl-12">
            <div class="card">
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
                                    <th>Son Güncellenem Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if ($user->avatar == null)
                                            <td>
                                                <img src="{{ asset('admin/img/avatars/default.png') }}" width="48"
                                                    height="48" class="rounded-circle me-2" alt="Avatar">
                                            </td>
                                        @endif

                                        @if (!$user->avatar == null)
                                            <td>
                                                <img src="{{ asset('admin/img/avatars/' . $user->avatar) }}" width="48"
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
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 align-middle">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a>
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewUserLabel">Yeni Kullanıcı Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="addUserForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" placeholder="Emir" id="name" name="name" old>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="mail" class="form-control" placeholder="emirceliknet@gmail.com" id="email"
                                name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" placeholder="********" id="password"
                                name="password">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Profil Fotoğrafı</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kaydet</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection


    @section('js')
        <script>
            $("#addUserForm").submit(function(e) {
                /**TOAST SETUP*/
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    width: '500px',
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                e.preventDefault();
                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: '/users-store',
                    data: form.serialize(),
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Kayıt başarıyla eklendi'
                        })

                    },
                    error: function(data) {
                        let errormessages = '';
                        Object.values(data.responseJSON.errors).forEach(element => {
                            errormessages += '<li>' + element + '</li>';
                        });;
                        Toast.fire({
                            icon: 'error',
                            title: 'Bir hata oluştu',
                            html: '<ul>' + errormessages + '</ul>',
                        })
                    },
                });

            });

            $(document).ready(function() {
                $('#userstable').DataTable();
            });
        </script>
    @endsection
