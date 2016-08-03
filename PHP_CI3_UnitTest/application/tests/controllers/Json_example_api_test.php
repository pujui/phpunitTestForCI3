<?php

/**
 * Class Json_example_api_test
 *  @author jimmy
 */
class Json_example_api_test extends TestCase
{
    /**
     * @group test1
     * @@dataProvider login_data
     * @test 輸入測試
     */
    public function login($status, $data)
    {
        $output = $this->request('POST', 'Json_example_api/login', ['data' => json_encode($data)]);

        $this->assertJson($output);

        $json = json_decode($output, TRUE);

        $this->assertEquals(isset($json['status'])? $json['status'] : '', $status);
    }

    /**
     * @@dataProvider login_moke_data
     * @test 輸入測試
     */
    public function login_moke_model($status = '', $result = '')
    {
        $data = ['user' => 'Jimmy', 'pwd'  => md5('123456')];
        
        $this->request->setCallable(
            function ($CI) use ($result) {
                // Without this line, we get "RuntimeException: The model name you are loading is the name of a resource that is already being used: Category_model"
                $CI->load->model('json_example_model');

                $model = $this->getDouble(
                        'json_example_model',
                        ['login' => $result]
                );
                $CI->json_example_model = $model;
            }
        );
        
        $output = $this->request('POST', 'Json_example_api/login', ['data' => json_encode($data)]);

        $this->assertJson($output);

        $json = json_decode($output, TRUE);

        $this->assertEquals(isset($json['status'])? $json['status'] : '', $status);
    }

    /**
     *登入測試資料
     * @group test2
     * @return array|
     */
    public function login_data()
    {
        // status, data
        return [
            [
                100, ['user' => 'Jimmy', 'pwd'  => md5('123456')]
            ],
            [
                101, ['user' => 'Jimmy', 'pwd'  => '123456']
            ],
            [
                200, ['user' => 'Jimmy']
            ],
            [
                200, ['hello']
            ]
        ];
    }

    /**
     * 模仿model回傳結果
     */
    public function login_moke_data()
    {
        // api status, model result
        return [
            [
                100, [['ID' => '1', 'USER_ID' => 'ABC', 'PWD' => 'e10adc3949ba59abbe56e057f20f883e', 'name' => 'jimmylin', 'LOGIN_DT' => '2016-07-14 00:00:00']]
            ],
            [
                300, FALSE
            ],
            [
                101, 0
            ]
        ];
    }
}
