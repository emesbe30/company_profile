<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Peserta</h1>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Jumlah Peserta</h4>
                        <div class="stats-figure"><?= $peserta; ?></div>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//col-->

        <div class="tab-content" id="orders-table-tab-content">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left" id="sortableTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle" onclick="sortTable(0)">Nama Peserta<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(1)">Domisili<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(2)">No Telepon / Whatsapp<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(3)">Alamat Email<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(4)">Jadwal yang dipilih<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(5)">Mengetahui dari mana<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(6)">Tipe pendaftaran<span class="sort-icon">&#9650;</span></th>
                                        <th class="text-center" valign="middle" onclick="sortTable(7)">Tanggal Daftar<span class="sort-icon">&#9650;</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($form as $f) : ?>
                                        <tr>
                                            <td><?= $f['nama_peserta'] ?></td>
                                            <td><?= $f['domisili'] ?></td>
                                            <td><?= $f['no_tlp'] ?></td>
                                            <td><?= $f['email'] ?></td>
                                            <td><?= $f['jadwal'] ?></td>
                                            <td><?= $f['survey'] ?></td>
                                            <td><?= $f['tipe_pendaftaran'] ?></td>
                                            <td><?= $f['created_at'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <script>
                                function sortTable(columnIndex) {
                                    const table = document.getElementById("sortableTable");
                                    const rows = Array.from(table.rows).slice(1); // Exclude header row
                                    const isAscending = table.getAttribute("data-sort-order") === "asc";
                                    const direction = isAscending ? 1 : -1;

                                    rows.sort((a, b) => {
                                        const aText = a.cells[columnIndex].innerText.trim();
                                        const bText = b.cells[columnIndex].innerText.trim();

                                        return aText.localeCompare(bText, undefined, { numeric: true }) * direction;
                                    });

                                    rows.forEach(row => table.tBodies[0].appendChild(row));
                                    table.setAttribute("data-sort-order", isAscending ? "desc" : "asc");

                                    // Update sort icons
                                    const headers = table.querySelectorAll("th .sort-icon");
                                    headers.forEach(icon => icon.innerHTML = "&#9650;"); // Reset all icons
                                    const currentIcon = table.rows[0].cells[columnIndex].querySelector(".sort-icon");
                                    currentIcon.innerHTML = isAscending ? "&#9660;" : "&#9650;"; // Toggle icon
                                }
                            </script>

                            <style>
                                .sort-icon {
                                    font-size: 0.8em;
                                    margin-left: 5px;
                                    cursor: pointer;
                                    display: inline;
                                }
                            </style>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content') ?>