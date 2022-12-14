<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <div class="addcart">
                <button data-bs-toggle="modal" data-bs-target="#addNew" id="addNewBtn" class="btn btn-success fw-bold">
                    <i class="align-middle" data-feather="user-plus"></i>
                    Yeni
                    Kullanıcı Ekle</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="table">
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
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if ($item->avatar == 'default.png')
                            <td>
                                <img src="{{ asset('img/avatarupload/default.png') }}" width="48" height="48"
                                    class="rounded-circle me-2" alt="Avatar">
                            </td>
                        @else
                            <td>
                                <img src="{{ asset('img/avatarupload/' . $item->avatar) }}" width="48"
                                    height="48" class="rounded-circle me-2" alt="Avatar">
                            </td>
                        @endif


                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($item->created_at))) }}
                        </td>
                        <td>{{ iconv('ISO-8859-2', 'UTF-8', strftime('%d %B %Y ', strtotime($item->updated_at))) }}
                        </td>
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
</script>
