<?php

class Json_example_api extends CI_Controller
{
    const SUCCESS_CODE      = 100;
    const DATA_EMPTY_CODE = 101;
    const INPUT_FAIL_CODE   = 200;
    const DB_FAIL_CODE      = 300;

    public function login()
    {
        $data   = json_decode($this->input->post('data'), TRUE);
        $status = self::SUCCESS_CODE;
        $msg    = 'SUCCESS';

        try
        {
            if (FALSE === $data
                    || empty($data)
                    || !isset($data['user'])
                    || !isset($data['pwd']))
            {
                throw new Exception('input is wrong', self::INPUT_FAIL_CODE);
            }
            
            $this->load->model('json_example_model');
            
            
            $result = $this->json_example_model->login(['user' => strtolower($data['user']), 'pwd' => $data['pwd']]);
            if (FALSE === $result)
            {
                throw new Exception('get data fail', self::DB_FAIL_CODE);
            }
            elseif (0 === $result)
            {
                throw new Exception('data is empty', self::DATA_EMPTY_CODE);
            }
            
        }
        catch (Exception $ex)
        {
            $result = [];
            $status = $ex->getCode();
            $msg    = $ex->getMessage();
        }
        finally
        {
            $rs = [
                'status' => $status,
                'msg'    => $msg,
                'data'   => $result
            ];

            echo json_encode($rs);
        }

    }
    
    public function md5_test()
    {
        echo md5($this->input->post('data'));
    }
}
