<script>
    $(".deleteBtn").click(function() {
        Swal.fire({
            title: 'Onaylıyor musunuz?',
            text: "Veri kalıcı olarak silinecektir, geri dönüşü yoktur.",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Vazgeç",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil'
        }).then((result) => {
            if (result.value) {
                var id = $(this).data('id');
                $.ajax({
                    url: "/roles/delete/" + id,
                    type: "GET",
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            width: '500px',
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Silme işlemi başarılı'
                        }).then(function() {
                            window.location.href = '/roles';
                        });
                    },
                })
            }
        });
    });
</script>
