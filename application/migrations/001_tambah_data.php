<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Tambah_Data extends CI_Migration {
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_user' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_user' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'username' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'password' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'level' => array(
                                'type' => 'varchar',
                                'constraint' => '10'
                        )

                ));
                $this->dbforge->add_key('id_user', TRUE);
                $this->dbforge->create_table('users');
                
                $this->dbforge->add_field(array(
                        'id_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => '25'
                        ),
                        'bobot_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => '4'
                        ),
                ));
                $this->dbforge->add_key('id_kriteria', TRUE);
                $this->dbforge->create_table('kriteria');

                $this->dbforge->add_field(array(
                        'id_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => 4,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'tgl_daftar' => array(
                                'type' => 'date',
                        ),
                        'nm_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'jk_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '6'
                        ),
                        'tempat_lahir' => array(
                                'type' => 'varchar',
                                'constraint' => '3'
                        ),
                        'tanggal_lahir' => array(
                                'type' => 'date',
                        ),
                        'almt_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'no_ktp' => array(
                                'type' => 'varchar',
                                'constraint' => '16'
                        ),
                        'status' => array(
                                'type' => 'varchar',
                                'constraint' => '7'
                        ),
                        'nohp_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '13'
                        ),
                        'pendidikan_akhir' => array(
                                'type' => 'varchar',
                                'constraint' => '3'
                        ),

                ));
                $this->dbforge->add_key('id_pelamar', TRUE);
                $this->dbforge->create_table('pelamar');

                $this->dbforge->add_field(array(
                        'id_karyawan' => array(
                                'type' => 'varchar',
                                'constraint' => 4,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_karyawan' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'tglmasukkerja' => array(
                                'type' => 'date',
                        ),      

                ));
                $this->dbforge->add_key('id_karyawan', TRUE);
                $this->dbforge->create_table('karyawan');

                $this->dbforge->add_field(array(
                        'id_periode' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'bulan' => array(
                                'type' => 'varchar',
                                'constraint' => '10'
                        ),
                        'tgl_pembukaan' => array(
                                'type' => 'date',
                        ),
                ));
                $this->dbforge->add_key('id_periode', TRUE);
                $this->dbforge->create_table('periode');


                $this->dbforge->add_field(array(
                        'id_kriteria1' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_kriteria2' => array(
                                'type' => 'varchar',
                                'constraint' => '25'
                        ),
                        'nilai_pembanding' => array(
                                'type' => 'integer',
                                'constraint' => '1'
                        ),
                ));
                $this->dbforge->create_table('perbandingan_kriteria');


        }
        
        public function down()
        {
                $this->dbforge->drop_table('petugas');
        }
}
