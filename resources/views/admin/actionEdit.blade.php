<a href="{{ url('revisi/visitor/edit', $model->id)}}" class="btn btn-xs btn-success btn-sm mx-1 my-1" id=""><i class="glyphicon glyphicon-edit"></i>Edit</a>
<a href="#" class="btn btn-xs btn-danger btn-sm mx-1 my-1"><i class="glyphicon glyphicon-edit"></i>Hapus</a>

{{-- modal edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Visitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/revisi/visitor/edit', $model->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="nama" class="form-label">Nama Lengkap : </label>
                    <input id="nama" type="text" class="form-control" name="visit_nama" value="{{ $model->visit_nama}}" required autofocus>
                    <label for="company" class="form-label">Nama Perusahaan : </label>
                    <input id="company" type="text" class="form-control" name="visit_company" value="{{ $model->visit_company}}" required>
                    <label for="department" class="form-label">Department : </label>
                    <input id="department" type="text" class="form-control" name="visit_department" value="{{ $model->visit_department}}" required>
                    <label for="respon" class="form-label">Responsibility : </label>
                    <input id="respon" type="text" class="form-control" name="visit_respon" value="{{ $model->visit_respon}}" required>
                    <label for="phone" class="form-label">No. HP : </label>
                    <input id="phone" type="text" class="form-control" name="visit_phone" value="{{ $model->visit_phone}}" required>
                    <label for="nik" class="form-label">No. ID : </label>
                    <input id="nik" type="text" class="form-control" name="visit_nik" value="{{ $model->visit_nik}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
