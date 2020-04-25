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
                        'id_kandidat' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_kandidat' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'jk_kandidat' => array(
                                'type' => 'varchar',
                                'constraint' => '6'
                        ),
                        'almt_kandidat' => array(
                                'type' => 'varchar',
                                'constraint' => '100'
                        ),
                        'nohp_kandidat' => array(
                                'type' => 'varchar',
                                'constraint' => '13'
                        ),
                        'pendidikan_akhir' => array(
                                'type' => 'varchar',
                                'constraint' => '3'
                        ),


                ));
                $this->dbforge->add_key('id_kandidat', TRUE);
                $this->dbforge->create_table('kandidat');

                $this->dbforge->add_field(array(
                        'id_divisi' => array(
                                'type' => 'varchar',
                                'constraint' => 2,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_divisi' => array(
                                'type' => 'varchar',
                                'constraint' => '10'
                        ),
                ));
                $this->dbforge->add_key('id_divisi', TRUE);
                $this->dbforge->create_table('divisi');

                $this->dbforge->add_field(array(
                        'id_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => 2,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => '25'
                        ),
                        'bobot_kriteria' => array(
                                'type' => 'integer',
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
