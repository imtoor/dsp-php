<?php 

describe('database pool' , function() {
	
	it('get the same instance', function() {

		$mock = \Mockery::mock(\Main\Creational\Singleton\DatabaseConnectionPool::class);
		$mock->shouldReceive('getConnection')->times(2);

		$connection1 = $mock::getConnection();
		$connection2 = $mock::getConnection();

		$this->assertSame($connection1, $connection2);
	});
});