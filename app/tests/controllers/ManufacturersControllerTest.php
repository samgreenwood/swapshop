<?php

class ManufacturersControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'manufacturers');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'manufacturers/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'manufacturers/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'manufacturers/1/edit');
		$this->assertTrue($response->isOk());
	}
}
