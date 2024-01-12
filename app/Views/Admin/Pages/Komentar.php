<?= $this->extend('Admin/Layout/Template'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>
                        <button type="button" class="btn btn-danger btn-sm float-right" onclick="hapusSelected()">Hapus Terpilih</button>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('komentar/hapus'); ?>" method="post" id="formHapus">
                            <div class="table-responsive">
                                <table id="tablerifkkimaulana" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <input type="checkbox" id="checkAll">
                                            </th>
                                            <th class="text-center">Artikel</th>
                                            <th class="text-center">Komentar</th>
                                            <th class="text-center">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($komentarData as $komentar) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="selected_items[]" class="checkbox-item" value="<?= $komentar['id']; ?>">
                                                </td>
                                                <td class="text-center"><?= $artikelMap[$komentar['artikel_id']]['judul']; ?></td>
                                                <td class="text-center"><?= $komentar['komentar']; ?></td>
                                                <td class="text-center"><?= $komentar['created_at']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('checkAll').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.checkbox-item');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('checkAll').checked;
        });
    });

    function hapusSelected() {
        var form = document.getElementById('formHapus');
        form.submit();
    }
</script>

<?= $this->endSection(); ?>