<table class="table table-bordered">
  <tr align="center">
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Deskripsi</th>
    <th colspan="2">Aksi</th>
  </tr>
  @php
    $no = 1;
  @endphp
  @foreach ($category as $ct)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $ct->name }}</td>
    <td>{{ $ct->description ?? '-' }}</td>
    <td align="center">
      <form action="{{ route('category.edit', $ct->id) }}" method="GET" style="display:inline;">
        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
      </form>
      <form id="form-delete-{{ $ct->id }}" 
        action="{{ route('category.destroy', $ct->id) }}" 
        method="POST" 
        style="display:none;">
      @csrf
      @method('DELETE')
      </form>

      <button type="button" 
        class="btn btn-danger btn-sm btn-confirm-delete" 
        data-bs-toggle="modal" 
        data-bs-target="#confirmDeleteModal"
        data-id="{{ $ct->id }}">
      Delete
      </button>
    </td>
  </tr>
  @endforeach
</table>
{{-- Modal Konfirmasi Hapus --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus data buku ini?  
        <strong>Data yang dihapus tidak bisa dikembalikan.</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btn-confirm-yes">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  @include('category.script')
@endpush