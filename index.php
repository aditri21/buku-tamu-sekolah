<?php 
include 'includes/header.php';
include 'includes/koneksi.php';

if (isset($_GET['success'])) {
    echo '<div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show">
            Data berhasil disimpan!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>';
}
?>

<div class="container mt-5">
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-primary text-white py-3">
            <h3 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Form Kunjungan</h3>
        </div>
        <div class="card-body">
            <form action="simpan.php" method="POST" class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <div class="invalid-feedback">Harap isi nama lengkap</div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi" required>
                        <div class="invalid-feedback">Harap isi nama instansi</div>
                    </div>
                    
                    <div class="col-12">
                        <label for="tujuan" class="form-label">Tujuan Kunjungan</label>
                        <textarea class="form-control" id="tujuan" name="tujuan" rows="3" required></textarea>
                        <div class="invalid-feedback">Harap isi tujuan kunjungan</div>
                    </div>
                </div>
                
                <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <i class="bi bi-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Validasi form Bootstrap
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<?php include 'includes/footer.php'; ?>