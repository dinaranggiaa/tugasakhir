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
                        'id_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => 4,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'jk_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '6'
                        ),
                        'no_ktp' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'almt_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'nohp_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => '13'
                        ),
                        'tempat_lahir' => array(
                                'type' => 'varchar',
                                'constraint' => '3'
                        ),
                        'tanggal_lahir' => array(
                                'type' => 'date',
                                'constraint' => '8'
                        ),
        

                ));
                $this->dbforge->add_key('id_pelamar', TRUE);
                $this->dbforge->create_table('pelamar');


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
                                'type' => 'double',
                                'constraint' => '1'
                        ),
                ));
                $this->dbforge->add_key('id_kriteria', TRUE);
                $this->dbforge->create_table('kriteria');
        }
        
        public function down()
        {
                $this->dbforge->drop_table('petugas');
        }
}
