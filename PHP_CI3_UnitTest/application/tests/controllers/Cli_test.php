<?php

class Cli_test extends TestCase
{
	public function test_index()
	{
            // 補上cli測試
            set_is_cli(FALSE);
            $this->warningOff();
            $output = $this->request('GET', ['cli', 'index']);
            $expected = 'Okay';
            $this->assertEquals($expected, $output);

            set_is_cli(TRUE);
            $this->warningOn();
            $output = $this->request('GET', ['cli', 'index']);
            $expected = 'You can not run this via CLI';
            $this->assertEquals($expected, $output);
	}
}
