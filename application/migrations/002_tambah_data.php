<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Tambah_Data extends CI_Migration {
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_pelamar' => array(
                                'type' => 'varchar',
                                'constraint' => 4,
                        ),
                        'id_kriteria' => array(
                                'type' => 'varchar',
                                'constraint' => '3'
                        ),
                        'nilai_tes' => array(
                                'type' => 'integer',
                                'constraint' => '1'
                        ),

                ));
                $this->dbforge->create_table('nilai_alternatif');
                
             
        }
        
        public function down()
        {
                $this->dbforge->drop_table('petugas');
        }
}
