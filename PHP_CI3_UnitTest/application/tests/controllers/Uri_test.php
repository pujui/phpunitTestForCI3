<?php

class Uri_test extends TestCase
{
	public function test_welcome_index_classmethod_uri()
	{
		$output = $this->request('GET', ['welcome', 'index']);
		$this->assertEquals('welcome/index', $this->CI->uri->uri_string());
	}

	public function test_welcome_index_classmethod_ruri()
	{
		$output = $this->request('GET', ['welcome', 'index']);
		$this->assertEquals('welcome/index', $this->CI->uri->ruri_string());
	}

	public function test_welcome_index_uri_uri()
	{
		$output = $this->request('GET', 'welcome/index');
		$this->assertEquals('welcome/index', $this->CI->uri->uri_string());
	}

	public function test_welcome_index_uri_ruri()
	{
		$output = $this->request('GET', 'welcome/index');
		$this->assertEquals('welcome/index', $this->CI->uri->ruri_string());
	}

	public function test_default_route_uri_uri()
	{
		$output = $this->request('GET', '/');
		$this->assertEquals('', $this->CI->uri->uri_string());
	}

	public function test_default_route_uri_ruri()
	{
		$output = $this->request('GET', '/');
		$this->assertEquals('welcome/index', $this->CI->uri->ruri_string());
	}

}
