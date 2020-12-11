<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TDatos extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id_datos'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'concepto_g'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'monto_g'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '250',
						],
						'fecha'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '250',
						],

                ]);
                $this->forge->addKey('id_datos', true);
                $this->forge->createTable('t_datos');
        }

        public function down()
        {
                $this->forge->dropTable('t_datos');
        }
}