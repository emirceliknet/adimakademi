<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <div class="addcart">
                <button data-bs-toggle="modal" data-bs-target="#addNew" id="addNewBtn" class="btn btn-success fw-bold">
                    <i class="align-middle" data-feather="plus"></i>
                    Yeni
                    Rol Ekle</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>İsim</th>
                    <th>Açıklama</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->info }}</td>
                        <td class="table-action">
                            <a data-bs-toggle="modal" data-bs-target="#show" class="showBtn"
                                data-id={{ $item->id }}><i class="align-middle text-info"
                                    data-feather="eye"></i><span class="text-black fw-bold"></span></a>
                            <a data-bs-toggle="modal" data-bs-target="#edit" class="editBtn"
                                data-id={{ $item->id }}><i class="align-middle text-info"
                                    data-feather="edit"></i></a>
                            <a class="deleteBtn" data-id={{ $item->id }}>
                                <i class="align-middle text-danger" data-feather="trash-2"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });



    //Model açıldıktan (Yetki Modal) sonra permission tablosundan bütün yetkileri çekmek için istek atılır.
    //Tıklanılan rolün bilgileri modale aktarılır
    //Aktarılan rolün bilgilerindeki yetkilerle tüm yetkiler karşılaştırılır. İlgili olanlar işaretlenir.
    //
</script>
