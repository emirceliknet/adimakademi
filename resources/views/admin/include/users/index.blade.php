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
    @include('admin.include.users.create')


    @include('admin.include.users.edit')
@endsection


@section('js')
    <script>
        /**TOAST SETUP*/

        $(".editBtn").click(function() {
            $("#preview").attr("src", "");
            var id = $(this).data('id');
            $.ajax({
                url: "/users/data/" + id,
                type: "GET",
                success: function(response) {
                    $('#editUserForm').find('#name').val(response.data.name);
                    $('#editUserForm').find('#email').val(response.data.email);
                    $('#editUserForm').find('#name').val(response.data.name);
                    $('#editUserForm').find('#id').val(response.data.id);

                    var img = response.data.avatar;
                    $("#preview").attr("src", "/img/avatarupload/" + img + "");
                },
            })
        });
        $("form#editUserForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '/users/edit',
                type: 'POST',
                data: formData,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        width: '500px',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Kayıt başarıyla güncellendi'
                    }).then(function() {
                        window.location.href = '/users';
                    });
                },
                error: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        width: '500px',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    let errormessages = '';
                    Object.values(data?.responseJSON?.errors).forEach(element => {
                        errormessages += '<li>' + element + '</li>';
                    });;
                    Toast.fire({
                        icon: 'error',
                        title: 'Bir hata oluştu',
                        html: '<ul>' + errormessages + '</ul>',
                    })
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        // this is the id of the form
        $("form#addUserForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '/users/create',
                type: 'POST',
                data: formData,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1000,
                        width: '500px',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Kayıt başarıyla eklendi'
                    }).then(function() {
                        window.location.href = '/users';
                    });
                },
                error: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        width: '500px',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    let errormessages = '';
                    Object.values(data?.responseJSON?.errors).forEach(element => {
                        errormessages += '<li>' + element + '</li>';
                    });;
                    Toast.fire({
                        icon: 'error',
                        title: 'Bir hata oluştu',
                        html: '<ul>' + errormessages + '</ul>',
                    })
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).ready(function() {
            $('#userstable').DataTable();
        });
    </script>
@endsection
