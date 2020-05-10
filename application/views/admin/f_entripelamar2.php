 
  <!-- Data pelamar -->
  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id pelamar</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Pendidikan Akhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php  $no = $this->uri->segment(3) + 1; ?>
                    <tbody id="tbl_data_pelamar">
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>