<?php
class Foo_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->library('Foo');
        $this->obj = $this->CI->foo;
    }

    public function test_doSomething()
    {
        $actual = $this->obj->doSomething();
        $expected = 'something';
        $this->assertEquals($expected, $actual);
    }
}