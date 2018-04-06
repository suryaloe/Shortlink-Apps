<?php namespace Tests\Support\Database\Migrations;

class Migration_Create_test_tables extends \CodeIgniter\Database\Migration
{
	public function up()
	{
		// User Table
		$this->forge->addField([
			'id'      => ['type' => 'INTEGER', 'constraint' => 3, 'auto_increment' => true],
			'name'    => ['type' => 'VARCHAR', 'constraint' => 80,],
			'email'   => ['type' => 'VARCHAR', 'constraint' => 100],
			'country' => ['type' => 'VARCHAR', 'constraint' => 40,],
			'deleted' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => '0'],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user', true);

		// Job Table
		$this->forge->addField([
			'id'          => ['type' => 'INTEGER', 'constraint' => 3, 'auto_increment' => true],
			'name'        => ['type' => 'VARCHAR', 'constraint' => 40],
			'description' => ['type' => 'TEXT'],
			'created_at'  => ['type' => 'DATETIME', 'null' => true]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('job', true);

		// Misc Table
		$this->forge->addField([
			'id'    => ['type' => 'INTEGER', 'constraint' => 3, 'auto_increment' => true ],
			'key'   => ['type' => 'VARCHAR', 'constraint' => 40],
			'value' => ['type' => 'TEXT'],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('misc', true);

		// Empty Table
		$this->forge->addField([
			'id'   => ['type' => 'INTEGER', 'constraint' => 3, 'auto_increment' => true],
			'name' => ['type' => 'VARCHAR', 'constraint' => 40,],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('empty', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
		$this->forge->dropTable('job');
		$this->forge->dropTable('misc');
		$this->forge->dropTable('empty');
	}

	//--------------------------------------------------------------------

}
