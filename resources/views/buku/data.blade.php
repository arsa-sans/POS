<center><h2>Data Buku</h2></center>
<table class="table table-bordered" >
  <tr align="center">
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th colspan="2">Aksi</th>
  </tr>
  @php 
  $no = 1; 
  @endphp
  @foreach ($data as $buku)
  <tr align="center">
    <td>{{ $no++ }}</td>
    <td>{{ $buku->judul }}</td>
    <td>{{ $buku->penulis }}</td>
    <td>{{ $buku->penerbit }}</td>
    <td>{{ $buku->tahun_terbit }}</td>
    <td>
      <form action="{{ route('buku.edit', $buku->kode_buku) }}" method="GET" style="display:inline;">
        <button type="submit">Edit</button>
      </form>
      <form id="form-delete-{{ $buku->kode_buku }}" 
        action="{{ route('buku.destroy', $buku->kode_buku) }}" 
        method="POST" 
        style="display:none;">
      @csrf
      @method('DELETE')
      </form>

      <button type="button" 
        class="btn btn-danger btn-sm btn-confirm-delete" 
        data-bs-toggle="modal" 
        data-bs-target="#confirmDeleteModal"
        data-id="{{ $buku->kode_buku }}">
      Hapus
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
      let deleteFormId = null;

      // Saat tombol hapus diklik → simpan ID form-nya
      document.querySelectorAll('.btn-confirm-delete').forEach(button => {
          button.addEventListener('click', function () {
              const id = this.getAttribute('data-id');
              deleteFormId = `form-delete-${id}`;
          });
      });

      // Saat tombol "Ya, Hapus" ditekan di modal
      document.getElementById('btn-confirm-yes').addEventListener('click', function () {
          if (deleteFormId) {
            document.getElementById(deleteFormId).submit();
          }
      });
    });
</script>
@endpush