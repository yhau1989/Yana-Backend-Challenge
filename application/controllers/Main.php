 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Main extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            $this->load->database();
            $this->load->library('grocery_CRUD');
        }

        /**
         * Index Page for this controller.
         */
        public function index()
        {
            echo "<h1>Welcome to the world of Yana (Main)</h1>";
        }

        /**
         * employees function (example)
         *
         * @return View https://codeigniter.com/userguide3/general/views.html?highlight=view
         */
        public function employees()
        {
            $crud = new grocery_CRUD();
            $crud->set_table('employees');
            $output = $crud->render();
            $this->load->view('main', $output);
        }

        /**
         * usuarios function
         *
         * @return View https://codeigniter.com/userguide3/general/views.html?highlight=view
         */
        public function usuarios()
        {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $output = $crud->render();

            $this->load->view('main_users', $output);
        }
    }
