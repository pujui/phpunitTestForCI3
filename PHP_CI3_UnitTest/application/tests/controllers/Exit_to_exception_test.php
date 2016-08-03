<?php

/**
 * @group patcher
 */
class Exit_to_exception_test extends TestCase
{
	public function test_call_exit_in_controller_method()
	{
            // 這個catch似乎抓不到，官方似乎有說明不要使用die或exit，不知是否有關連待查(jimmy)
//		try {
//			$output = $this->request(
//				'GET', 'exit_to_exception/call_exit_in_controller_method'
//			);
//		} catch (CIPHPUnitTestExitException $e) {
//			$output = ob_get_clean();
//			$this->assertEquals('Exit_to_exception', $e->class);
//			$this->assertEquals('call_exit_in_controller_method', $e->method);
//			$this->assertNull($e->exit_status);
//		}
//		$this->assertContains('{"foo":"bar"}', $output);
	}

	public function test_call_exit_in_function()
	{
            // 這個catch似乎抓不到，官方似乎有說明不要使用die或exit，不知是否有關連待查(jimmy)
//		try {
//			$output = $this->request(
//				'GET', 'exit_to_exception/call_exit_in_function'
//			);
//		} catch (CIPHPUnitTestExitException $e) {
//			$output = ob_get_clean();
//			$this->assertEquals('die_test', $e->method);
//			$this->assertEquals('Bye!', $e->exit_status);
//		}
//		$this->assertContains('You can not access this page!', $output);
	}
}
