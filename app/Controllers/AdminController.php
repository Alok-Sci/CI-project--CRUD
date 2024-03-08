<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{

    protected $adminModel;

    public function __construct()
    {
        $db               = db_connect();
        $this->adminModel = new AdminModel($db);
    }

    public function index()
    {
        $session = session();

        // check if the session with login exists or not
        $logged_in = $session->logged_in ?? NULL;

        if (!$logged_in) {
            // redirect to the login page with error message 
            return redirect()->to('admin/login')->with('error', 'Please login to access admin panel');
        } else {
            $data = [
                'title' => 'Home',
                'admin_name' => session()->admin_name,
                'main_content' => 'index' // return index view
            ];
            echo view('templates/template', $data);
        }
    }

    public function login()
    {
        $session = session();
        if (!isset($session->logged_in)) {
            // if the login page requested with get request  
            //if request method is post 
            if ($this->request->getMethod() === 'post') {

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                // $admin = $this->adminModel->is_admin($username, $password);
                $admin = $this->adminModel->is_admin($username, $password);
                //     echo '<pre>';
                // print_r($admin);

                if ($admin) {
                    // instantiate a session 
                    // $_SESSION['logged_in'] = true;
                    // $_SESSION['admin_id'] = $admin['id'];


                    // set a session 
                    $session = session();
                    $session->set('logged_in', true);
                    $session->set('admin_id', $admin->id);
                    $session->set('admin_name', $admin->name);

                    echo "Admin found!";
                    return redirect()->to('/')->with('success', 'Login successfull');

                } else {
                    // print_r($admin);
                    return redirect()->back()->with('error', 'Invalid username or password');
                }
            } else {
                $data = [
                    'title' => 'Login', //set title for login page
                    'main_content' => 'login' // return login view
                ];
                echo view('templates/header', ['title' => 'Login']) . view('login');

                // echo view('templates/template', $data);
            }

        } else {
            return redirect()->to('/')->with('success', 'You are already logged in');
        }
    }

    public function logout()
    {
        // destroy session 
        $session = session();

        if (!session()->logged_in)
            return redirect()->to('/admin/login')->with('error', 'You are not logged in');
            
        $session->set('logged_in', false);

        if ($session->destroy())
            return redirect()->to('admin/login')->with('success', 'Logout Successfull');
    }


}
