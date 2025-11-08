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