<?php

class PurchasesControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'purchases');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'purchases/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'purchases/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'purchases/1/edit');
		$this->assertTrue($response->isOk());
	}
}
