<?php

class Json_example_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
        $this->mysql = $this->load->database('mysql', true);
    }

    public function login($param = [])
    {
        if (!is_array($param)
                || empty($param))
        {
            return FALSE;
        }
                
        $bind = [
            ':USER' => $param['user'],
            ':PWD'  => $param['pwd']
        ];
        
        $sql = 'SELECT * FROM test.USER U WHERE U.USER_ID = ? AND U.PWD = ?';
        
        
        $query = $this->mysql->query($sql, $bind);
        if (FALSE === $query)
        {
            return FALSE;
        }
        elseif(0 === $query->num_rows())
        {
            return 0;
        }
        
        return $query->result_array();
    }
    
}
