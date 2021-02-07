<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$fields = [
				'id'          => [
						'type'           => 'INT',
						'constraint'     => 5,
						'unsigned'       => true,
						'auto_increment' => true
				],
				'title'       => [
						'type'           => 'VARCHAR',
						'constraint'     => '100',
						'unique'         => true,
				],
				'author'      => [
						'type'           =>'VARCHAR',
						'constraint'     => 100,
						'default'        => 'King of Town',
				],
				'description' => [
						'type'           => 'TEXT',
						'null'           => true,
				],
				'status'      => [
						'type'           => 'ENUM',
						'constraint'     => ['publish', 'pending', 'draft'],
						'default'        => 'pending',
				],
			];
			$forge = \Config\Database::forge();
			$forge->addField($fields);
			$forge->addPrimaryKey('id');
			$forge->addUniqueKey(['id']);
		
			$forge->createTable('test');
			dd($forge);
		
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
