<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'users';
    }

    /**
     * getById function
     *
     * @param [int] $idUser
     * @return row https://codeigniter.com/userguide3/database/results.html?highlight=row
     */
    public function getById($idUser)
    {
        $this->db->select('id, email');
        $this->db->from($this->table_name);
        $this->db->where('id', $idUser);
        $row = $this->db->get()->row();

        return $row;
    }

    /**
     * validateExistEmail function
     *
     * @param [string] $email
     * @return int
     */
    public function validateExistEmail($email)
    {
        return $this->db->get_where($this->table_name, array('email' => $email))->num_rows();
    }

    /**
     * login function
     *
     * @param [type] $email
     * @param [type] $psw
     * @return array
     */
    public function login($email, $psw)
    {
        $this->db->select('email, password');
        $this->db->from($this->table_name);
        $this->db->where('email', $email);
        //$this->db->where('password', $psw);
        // $this->db->where('password', md5($psw)); //md5 for this challenge is optional
        $row = $this->db->get()->row();

        if (isset($row)) {
            if ($row->password == $psw) {
                return array(
                    'status' => 0,
                    'data' => $row
                );
            }
            return array(
                'status' => 1,
                'data' => 'La contraseña es incorrecta, ingrese una contraseña valida o realize recuperela en el link de abajo.'
            );
        } else {
            return array(
                'status' => 1,
                'data' => 'Su email no esta resgitrado.'
            );
        }
    }

    /**
     * insertUser function
     *
     * @param [type] $email
     * @param [type] $psw
     * @return bool
     */
    public function insertUser($data)
    {
        $this->db->insert($this->table_name, $data);
        return true;
    }
}
