<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Kullanıcı Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="editForm">
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
                        <input type="file" name="image" id="avatar" class="form-control" />
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 d-flex justify-content-center">
                        <img id="preview" src="" class="img-fluid profileimage" alt="">
                    </div>
                    <button type="submit" id="upload" class="btn btn-primary w-100 ">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(".editBtn").click(function() {
        $("#preview").attr("src", "");
        var id = $(this).data('id');
        $.ajax({
            url: "/users/data/" + id,
            type: "GET",
            success: function(response) {
                $('#editForm').find('#name').val(response.data.name);
                $('#editForm').find('#email').val(response.data.email);
                $('#editForm').find('#name').val(response.data.name);
                $('#editForm').find('#id').val(response.data.id);

                var img = response.data.avatar;
                $("#preview").attr("src", "/img/avatarupload/" + img + "");
            },
        })
    });
    $("form#editForm").submit(function(e) {
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
</script>
