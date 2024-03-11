<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $db              = db_connect();
        $this->userModel = new UserModel($db);
    }
    public function index()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('admin/login')->with('error', 'Please login to access admin panel');
        } else {
            $data = [
                'title' => 'User Controller Title',
                'main_content' => 'create' // return create view page 
            ];
            echo view('templates/template', $data);
        }
    }

    public function add()
    {
        // $session = session();
        if (isset(session()->logged_in)) {
            if ($this->request->getMethod() === 'post') {

                // set rules for validation 
                $rules = [
                    'firstname' => 'required|alpha|min_length[3]|max_length[50]',
                    'lastname' => 'required|alpha|min_length[3]|max_length[50]',
                    'fathername' => 'required|alpha_space|min_length[3]|max_length[50]',
                    'mothername' => 'required|alpha_space|min_length[3]|max_length[50]',
                    'email' => 'required|valid_email|min_length[10]',
                    'dob' => 'required|valid_date',
                    'gender' => 'required|alpha|max_length[6]',
                    'country' => 'required|integer',
                    'state' => 'required|integer',
                    'city' => 'required|integer',
                    'pincode' => 'required|integer|exact_length[6]',
                    'qualification' => 'required|alpha',
                    'tech_skills' => 'required',
                    'description' => 'required|string|min_length[20]|max_length[200]', 
                    'profile_pic' => 'uploaded[profile_pic]|is_image[profile_pic]|max_size[profile_pic, 5140]', 
                    'sign_pic' => 'uploaded[sign_pic]|is_image[sign_pic]|max_size[sign_pic, 2048]' 
                ];

                if ($this->validate($rules)) {

                    $data['firstname']     = $this->request->getPost('firstname');
                    $data['lastname']      = $this->request->getPost('lastname');
                    $data['fathername']    = $this->request->getPost('fathername');
                    $data['mothername']    = $this->request->getPost('mothername');
                    $data['email']         = $this->request->getPost('email');
                    $data['dob']           = $this->request->getPost('dob');
                    $data['gender']        = $this->request->getPost('gender');
                    $data['country']       = $this->request->getPost('country');
                    $data['state']         = $this->request->getPost('state');
                    $data['city']          = $this->request->getPost('city');
                    $data['pincode']       = $this->request->getPost('pincode');
                    $data['qualification'] = $this->request->getPost('qualification');
                    $data['tech_skills']   = implode(",", $this->request->getPost('tech_skills'));
                    $data['description']   = $this->request->getPost('description');
                    $data['profile_pic']   = $this->request->getFile('profile_pic')->getName().time();
                    $data['sign_pic']      = $this->request->getFile('sign_pic')->getName().time();


                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";

                    $added = $this->userModel->add($data);
                    if ($added) {
                        // move file to uploads folder
                        $this->request->getFile('profile_pic')->move(FCPATH . 'uploads/profile', $data['profile_pic']);
                        $this->request->getFile('sign_pic')->move(FCPATH . 'uploads/sign', $data['sign_pic']);

                        return redirect()->to('user/add')->with('success', 'User record added successfully');
                    } else {
                        return redirect()->to('user/add')->with('error', 'Some error occurred, Can\'t add user record');
                    }
                } 
                else {
                    // redirect to the previous page and return the validation errors by storing them in field_error variable 
                    return redirect()->back()->with('errors', $this->validator->getErrors());
                }
            } else if ($this->request->getMethod() === 'get') {
                // return redirect()->back()->with('error', 'Some error occurred! Please try again later');

                $countries = $this->userModel->getCountry();

                $data = [
                    'title' => 'Add User',
                    'admin_name' => session()->admin_name,
                    'main_content' => 'add_user',
                    'countries' => $countries
                ];
                echo view('templates/template', $data);
            } else {
                return redirect()->to('/', 'Nothing to display');
            }
        } else {
            return redirect()->to('admin/login')->with('error', 'Please login to access admin panel');
        }
    }

    public function list()
    {
        if (isset(session()->logged_in)) {
            if ($this->request->getMethod() === 'get') {
                $users = $this->userModel->getUsers();

                if ($users) {
                    $data = [
                        'title' => 'User Records',
                        'admin_name' => session()->admin_name,
                        'main_content' => 'show_users',
                        'users' => $users
                    ];
                    echo view('templates/template', $data);
                } else {
                    return redirect()->to('/user/list')->with('error', 'No data found');
                }
            }
        } else {
            return redirect()->to('/admin/login')->with('error', 'Please login to access admin panel');
        }
    }

    // view user  
    public function viewUser($user_id)
    {
        if (isset(session()->logged_in)) {
            if ($this->request->getMethod() === 'get') {
                $user = $this->userModel->getUser($user_id);

                $country = $this->userModel->getCountryById($user[0]->country_id);
                $state   = $this->userModel->getStateById($user[0]->state_id);
                $city    = $this->userModel->getCityById($user[0]->city_id);

                // echo "<pre>";
                // print_r($country);
                // echo "</pre>";
                $data = [
                    'title' => 'Show User',
                    'admin_name' => session()->admin_name,
                    'user' => $user,
                    'main_content' => 'view_user',
                    'user_country' => $country[0]->name ?? NULL,
                    'user_state' => $state[0]->name ?? NULL,
                    'user_city' => $city[0]->name ?? NULL
                ];
                echo view('templates/template', $data);
            } else {
                return redirect()->back()->with('error', 'Cannot access the page');
            }
        } else {
            return redirect()->to('/admin/login')->with('error', 'Please login to access admin panel');
        }
    }
    public function editUser($user_id)
    {
        session()->setFlashdata("edit_id", $user_id, );
        if (isset(session()->logged_in)) {
            if ($this->request->getMethod() === 'get') {
                $userData    = $this->userModel->getUser($user_id);
                $countries   = $this->userModel->getCountry();
                $tech_skills = explode(", ", $userData[0]->tech_skills);

                $data = [
                    'title' => 'Edit User',
                    'edit_id' => $user_id,
                    'admin_name' => session()->admin_name,
                    'user' => $userData,
                    'main_content' => 'edit_user',
                    'countries' => $countries,
                    'tech_skills' => $tech_skills
                ];

                echo view('templates/template', $data);

            } else if ($this->request->getMethod() === 'post') {
                $data['firstname']     = $this->request->getPost('firstname');
                $data['lastname']      = $this->request->getPost('lastname');
                $data['fathername']    = $this->request->getPost('fathername');
                $data['mothername']    = $this->request->getPost('mothername');
                $data['email']         = $this->request->getPost('email');
                $data['dob']           = $this->request->getPost('dob');
                $data['gender']        = $this->request->getPost('gender');
                $data['country']       = $this->request->getPost('country');
                $data['state']         = $this->request->getPost('state');
                $data['city']          = $this->request->getPost('city');
                $data['pincode']       = $this->request->getPost('pincode');
                $data['qualification'] = $this->request->getPost('qualification');
                $data['tech_skills']   = implode(", ", $this->request->getPost('tech_skills'));
                $data['description']   = $this->request->getPost('description');

                // if files are not valid then 
                if ($this->request->getFile('profile_pic')->isValid()) {
                    $data['profile_pic'] = $this->request->getFile('profile_pic')->getName() . time();
                }

                if ($this->request->getFile('sign_pic')->isValid()) {
                    $data['sign_pic'] = $this->request->getFile('sign_pic')->getName() . time();
                }

                $updated = $this->userModel->updateUser($user_id, $data);
                if ($updated) {
                    // move file to uploads folder
                    if (isset($data['profile_pic'])) {
                        $this->request->getFile('profile_pic')->move(FCPATH . '/uploads/profile/', $data['profile_pic']);
                    }
                    if (isset($data['sign_pic'])) {
                        $this->request->getFile('sign_pic')->move(FCPATH . '/uploads/sign/', $data['sign_pic']);
                    }

                    return redirect()->to("/user/$user_id/edit/")->with('success', 'User information updated successfully');
                } else {
                    return redirect()->back()->with('error', 'Some error occurred while registering user');
                }
            } else {
                return redirect()->back()->with('error', 'Cannot access the page');
            }
        } else {
            return redirect()->to('/admin/login')->with('error', 'Please login to access admin panel');
        }
    }
    public function deleteUser($user_id)
    {
        if (isset(session()->logged_in)) {
            if ($this->request->getMethod() === 'get') {
                $deleted = $this->userModel->deleteUser($user_id);
                if ($deleted) {
                    return redirect()->back()->with('success', 'Record deleted successfully');
                } else {
                    return redirect()->back()->with('error', 'Unable to delete the record');
                }
            } else {
                return redirect()->back()->with('error', 'Cannot access the page');
            }
        } else {
            return redirect()->to('/admin/login')->with('error', 'Please login to continue');
        }
    }

    // load all countries 
    public function loadCountry()
    {
        echo $this->userModel->getCountry();
    }

    // load all states 
    public function loadState()
    {
        echo $this->userModel->getState();
    }

    // load all cities
    public function loadCity()
    {
        echo $this->userModel->getCountry();
    }

    // load states using country id  for ajax only 
    public function loadStateByCountry($country_id)
    {
        if ($this->request->isAJAX()) {

            // get user id from session 
            $user_id = session()->edit_id; //emptied the flash data
            session()->setFlashdata('edit_id', $user_id); // set the flash data for next use


            // if the requester page is user/add then response will be states 
            if (!$user_id) {
                $states = $this->userModel->getStateByCountry($country_id);

                foreach ($states as $state) {
                    echo "<option value=\"$state->id\" >$state->name</option>";
                }
            } else if ($user_id) {
                $userSelected = $this->userModel->getSelectedStateByCountry($user_id, $country_id);
                $states       = $this->userModel->getStateByCountry($country_id);

                foreach ($states as $state) {
                    $selected = $userSelected[0]->state_id === $state->id ? 'selected' : NULL;
                    echo "<option value=\"$state->id\" " . $selected . " >$state->name</option>";
                }

            } else {
                echo 'Not a valid request';
            }
            // echo json_encode($states);
        } else {
            echo 'Cannot access the page';
        }

    }

    public function loadCityByStateAndCountry($country_id, $state_id)
    {

        if ($this->request->isAJAX()) {

            // get user id from session 
            $user_id = session()->edit_id;
            // $user_id = 3;

            // if the requester page is user/add then response will be states 
            if (!$user_id) {
                // echo "hello";
                $cities = $this->userModel->getCityByStateAndCountry($country_id, $state_id);

                foreach ($cities as $city) {
                    echo "<option value=\"$city->id\">$city->name</option>";
                }
            } else if ($user_id) {
                // echo "hello";
                $userSelected = $this->userModel->getSelectedCityByStateAndCountry($user_id, $country_id, $state_id);
                $cities       = $this->userModel->getCityByStateAndCountry($country_id, $state_id);

                print_r($userSelected);
                print_r($cities);

                foreach ($cities as $city) {
                    $selected = $userSelected[0]->city_id === $city->id ? 'selected' : NULL;
                    echo "<option value=\"$city->id\" " . $selected . " >$city->name</option>";
                }
            } else {
                echo 'Not a valid request';
            }

        } else {
            echo 'Cannot access the page';
        }
    }
}

