<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserLabel">Kullanıcı Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="editUserForm">
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
