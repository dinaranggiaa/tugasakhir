<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Tambah_Data extends CI_Migration {
        public function up()
        {
               
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
                        'no_ktp' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'nm_orangtua' => array(
                                'type' => 'varchar',
                                'constraint' => '13'
                        ),       

                ));
                $this->dbforge->add_key('id_karyawan', TRUE);
                $this->dbforge->create_table('karyawan');

                $this->dbforge->add_field(array(
                        'id_periode' => array(
                                'type' => 'varchar',
                                'constraint' => 2,
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
