<div class="modal fade" id="show" tabindex="-1" aria-labelledby="showLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showLabel">Kullanıcı rolü düzenleme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="showForm">
                    @csrf
                    <div class="htmlcont">

                    </div>
                    <input type="hidden" id="idvalue" name="id" value="">
                    <button type="submit" id="upload" class="btn btn-primary w-100 ">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(".showBtn").click(function() {
        var id = $(this).data('id');
        $("#idvalue").val(id);
        let innerhtmlcontent = '';
        $.ajax({
            url: "/users/show/data/" + id,
            type: "GET",
            success: function(response) {
                Object.values(response.data).forEach(function(item) {
                    if (item.checked) {
                        $checked = "checked";
                    } else {
                        $checked = "";
                    }
                    innerhtmlcontent += `<div class="form-check"><input name="val[]" value="${item.id}"  ${$checked} class="form-check-input" type="checkbox"  id="flexCheckDefault${item.id}">
                        <label class="form-check-label" for="flexCheckDefault${item.id}">
                            ${item.name}
                        </label> </div>`;

                });
                $("div.htmlcont").html(innerhtmlcontent);
            },
        })
    });
    $("form#showForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '/users/update_role',
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
                    title: 'Kullanıcı rol düzenleme işlemi başarılı'
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
