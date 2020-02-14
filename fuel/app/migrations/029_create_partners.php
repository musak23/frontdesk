<?php

namespace Fuel\Migrations;

class Create_partners
{
	public function up()
	{
		\DBUtil::create_table('partners', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'partner_name' => array('constraint' => 140, 'type' => 'varchar'),
			'account_manager' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'partner_type' => array('constraint' => 140, 'type' => 'varchar'),
			'bank_account' => array('constraint' => 20, 'type' => 'varchar', 'null' => true),
			'billing_currency' => array('constraint' => 3, 'type' => 'char', 'default' => 'KES', 'null' => true),
			'default_rate_ref' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'tax_ID' => array('constraint' => 20, 'type' => 'varchar', 'null' => true),
			'partner_group' => array('constraint' => 140, 'type' => 'varchar'),
			'phone' => array('constraint' => 140, 'type' => 'varchar', 'unique' => true),
			'email_address' => array('constraint' => 140, 'type' => 'varchar', 'null' => true),
			'first_billed' => array('type' => 'date', 'null' => true),
			'last_billed' => array('type' => 'date', 'null' => true),
			'inactive' => array('type' => 'tinyint', 'default' => 0, 'null' => true),
			'credit_limit' => array('type' => 'decimal', 'default' => 0.00, 'null' => true),
			'on_hold' => array('type' => 'tinyint', 'default' => 0, 'null' => true),
			'on_hold_from' => array('type' => 'date', 'null' => true),
			'on_hold_to' => array('type' => 'date', 'null' => true),
            'remarks' => array('type' => 'text', 'null' => true),
			'fdesk_user' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
            
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('partners');
	}
}