<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        echo "<h1>Welcome to the world of Yana</h1>";
    }

    /**
     * new function
     *
     * @return Output Class
     */
    public function new()
    {
        try {

            $method = $this->input->method();
            if ($method != 'post') {
                return $this->http_response('Method ' . $method . 'not allowed', 405, 'error');
            }

            $stream_clean = $this->input->raw_input_stream;
            $request = json_decode($stream_clean);

            if (isset($request->email) && isset($request->password) && $this->validateEmail($request->email) > 0) {
                return $this->createUser($request->email, $request->password);
            }

            return $this->http_response('Bad request', 403, 'error');
        } catch (Exception $e) {
            return $this->http_response('Internal server error', 500, 'error');
        }
    }


    /**
     * get_conversations function
     *
     * @param [int] $idUser 
     * @return Output Class
     */
    function get_conversations($idUser = null)
    {
        $method = $this->input->method();
        if ($method != 'get')
            return $this->http_response('Method ' . $method . 'not allowed', 405, 'error');

        //only numbers
        if (!ctype_digit($idUser))
            return $this->http_response('Bad request', 403, 'error');

        $this->load->model('User_model');
        $this->load->model('UserActivities_model');
        $user_exists = $this->User_model->getById($idUser);

        if ($user_exists) {
            $activities = $this->UserActivities_model->get_by("uid", $idUser);
            $response['code'] = 200;
            $response['payload'] = $activities;
            return $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_status_header(200)
                ->set_output(json_encode($response));
        }

        return $this->http_response('User id does not exist', 404, 'error');
    }

    /**
     * http_response function
     *
     * @param [string] $text
     * @param [string] $status_code
     * @param [string] $type
     * @return Output Class
     */
    private function http_response($text, $status_code, $type)
    {
        return $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_status_header($status_code)
            ->set_output(json_encode(array(
                'text' => $text,
                'type' => $type,
            )));
    }

    /**
     * validateEmail function
     *
     * @param [string] $email
     * @return preg_match function
     */
    private function validateEmail($email)
    {
        $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
        return preg_match($email_validation_regex, $email);
    }


    /**
     * createUser function
     *
     * @param [string] $email
     * @param [string] $password
     * @return http_response function
     */
    private function createUser($email, $password)
    {
        $this->load->model('User_model');
        try {
            if ($this->User_model->validateExistEmail($email) == 0) {
                $data['email'] = $email;
                $data['password'] = $password;
                $response = $this->User_model->insertUser($data);
                return $this->http_response('Success add user', 201, 'success', $response);
            }

            return $this->http_response('User email already exist', 403, 'error');
        } catch (Exception $e) {
            return false;
            return $this->http_response('Internal server error', 500, 'error');
        }
    }
}
