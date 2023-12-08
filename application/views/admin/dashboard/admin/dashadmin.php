<!-- Meta -->
<?php $this->load->view('template/meta') ?>
<!-- Navbar -->
<?php $this->load->view('template/navbar') ?>
<!-- Main Sidebar Container -->
<?php $admin_name = $this->session->userdata('admin_name'); ?>
<?php $this->load->view('template/sidebar', ['admin_name' => $admin_name]); ?>

<div class="row">
    <div class="col-12">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/admin/tambahadmin'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Admin</a>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 330px; ">
                        <input type="text" name="table_search" id="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default" id="searchBtn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- File: application/views/admin/dashboard/admin.php -->

            <div class="card-body table-responsive p-0" id="searchResultContainer">
                <!-- Display search results here -->
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($admin->result_array() as $a) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td><?= $a['username']; ?></td>
                                <td><?= $a['password']; ?> </td>
                                <td><?= $a['nama_admin']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/admin/ubahadmin/' . $a['id_admin']); ?>" class="btn btn-warning"><i class="fa fa-edit text-light"></i></a>
                                    <a href="<?= base_url('admin/admin/deleteadmin/' . $a['id_admin']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event untuk memproses pencarian secara dinamis
        $('#table_search').on('input', function() {
            var keyword = $(this).val();
            if (keyword.length >= 3 || keyword.length === 0) {
                loadAdminData(keyword);
            } else {
                // Clear the results if the keyword is too short
                $('#searchResultContainer tbody').html('');
            }
        });

        function loadAdminData(keyword) {
            // Script AJAX untuk pembaruan data admin
            $.ajax({
                url: "<?= base_url('admin/admin/searchAdmin') ?>",
                type: "POST",
                data: {
                    table_search: keyword
                },
                success: function(data) {
                    $('#searchResultContainer tbody').html(data);
                }
            });
        }
    });
</script>

<!-- ... Your existing HTML code ... -->



<!-- ... Your existing HTML code ... -->


<!-- Footer -->
<?php $this->load->view('template/footer') ?>
<!-- JS -->
<?php $this->load->view('template/js') ?>

<!-- content -->