<?php

class ListingsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'listings');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'listings/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'listings/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'listings/1/edit');
		$this->assertTrue($response->isOk());
	}
}
