<?php

/**
 * Class Json_example_api_test
 *  @author jimmy
 * @group TestAssert
 */
class Assert_test extends TestCase
{
    /**
     *  檢查class是否有該屬性
     */
    public function test_assertClassHasAttribute()
    {
        $this->assertClassHasAttribute('isProperty', 'test1');
        $this->assertClassNotHasAttribute('notProperty', 'test1');
    }

    /**
     * 檢查class是否有該Static屬性
     */
    public function test_assertClassHasStaticAttribute()
    {
        $this->assertClassHasStaticAttribute('isStatic', 'test1');
        $this->assertClassNotHasStaticAttribute('notStatic', 'test1');
    }

    /**
     * 檢查class內的static 屬性內的陣列值的型態。
     */
    public function test_assertAttributeContainsOnly()
    {
        $this->assertAttributeContainsOnly('string', 'chk_arr_type', 'test1', 'private', '驗證失敗');
        $this->assertAttributeNotContainsOnly('int', 'chk_arr_type', 'test1', '');
    }

    /**
         *  驗證array 內的 class 類別是否正確。
         */
    public function test_assertContainsOnlyInstancesOf()
    {
        $this->assertContainsOnlyInstancesOf(
            test1_father::class,
            [new test1, new test1, new test1_father]
        );
    }

    /**
         *  驗證array 數量
         */
    public function test_assertCount()
    {
        $this->assertCount(1, ['1']);
        $this->assertNotCount(0, ['1']);
    }

    /**
         *  驗證array 是否為空
         */
    public function test_assertEmpty()
    {
        $this->assertEmpty([]);
        $this->assertNotEmpty(['foo']);
    }

    /**
     * 檢查陣列集合是否正確
     */
    public function test_assertArraySubset()
    {
        $subset = [
            'config' => ['key-a', 'key-c']
        ];
        $arr  =  [
            'config' => ['0' => 'key-a', '2' => 'key-c', '1' => 'key-c', '3' => 'key-d']
        ];


        /*
                 *  $arr 必須滿足 $subset的所有元素，順序也必須相等。
                 *  $subset 集合
                 *  $arr      要比對的陣列
                 *  bool     是否完全比對 - 如果為FALSE， $arr 只要滿足 $subset內所有的元素即可。(default: TRUE) -> @todo 待測試
                 *
                 *
                 */
        $this->assertArraySubset($subset, $arr);
    }

    /**
     *  驗證陣列值
     */
    public function test_assertContains()
    {
        $this->assertContains(1, [1, 2, 3], '元素錯誤');
        $this->assertNotContains(4, [1, 2, 3]);
    }

    /**
     *  驗證陣列key值
     */
    public function test_assertArrayHasKey()
    {
        $this->assertArrayHasKey('bar', ['bar' => 'baz'], 'key not exists');
        $this->assertArrayNotHasKey('foo', ['bar' => 'baz']);
    }

    public function test_assertContainsOnly()
    {
        $this->assertContainsOnly('string', ['1', '2', '3']);
        $this->assertNotContainsOnly('string', ['1', '2', 3]);
    }

}
class test1 extends test1_father
{
    public static $isStatic = TRUE;
    public $isProperty = '';
    private static $chk_arr_type = ['1', '2', '3'];
}
class test2
{

}
class test1_father
{

}