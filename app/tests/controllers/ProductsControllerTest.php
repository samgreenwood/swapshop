<?php

class ProductsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'products');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'products/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'products/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'products/1/edit');
		$this->assertTrue($response->isOk());
	}
}
