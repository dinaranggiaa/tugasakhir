<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Tambah_Data extends CI_Migration {
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_petugas' => array(
                                'type' => 'varchar',
                                'constraint' => 3,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nm_petugas' => array(
                                'type' => 'varchar',
                                'constraint' => '50'
                        ),
                        'username' => array(
                                'type' => 'varchar',
                                'constraint' => '10'
                        ),
                        'password' => array(
                                'type' => 'varchar',
                                'constraint' => '10'
                        )
                ));
        }
        public function down()
        {
                $this->dbforge->drop_table('petugas');

        }
}
