<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\DatabaseConnectionInterface;

class UserModel extends Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    public function add($data)
    {
        $data = [
            'name' => $data['firstname'] . " " . $data['lastname'],
            'father' => $data['fathername'],
            'mother' => $data['mothername'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'country_id' => $data['country'] ,
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'pincode' => $data['pincode'],
            'qualification' => $data['qualification'],
            'tech_skills' => $data['tech_skills'],
            'description' => $data['description'],
            'pic_name' => $data['profile_pic'],
            'sign_pic_name' => $data['sign_pic']
        ];

        return $this->db->table('tbl_user')->insert($data);
    }

    public function getUsers()
    {
        return $this->db->table('tbl_user')->get()->getResult();
        // return $this->query('SELECT * FROM tbl_user')->get()->getResults();
    }

    public function getUser($user_id)
    {
        return $this->db->table('tbl_user')->where(['id' => $user_id])->get()->getResult();
    }

    public function updateUser($user_id, $updated_data)
    {
        $data = [
            'name' => $updated_data['firstname'] . " " . $updated_data['lastname'],
            'father' => $updated_data['fathername'],
            'mother' => $updated_data['mothername'],
            'email' => $updated_data['email'],
            'dob' => $updated_data['dob'],
            'gender' => $updated_data['gender'],
            'country_id' => $updated_data['country'],
            'state_id' => $updated_data['state'],
            'city_id' => $updated_data['city'],
            'pincode' => $updated_data['pincode'],
            'qualification' => $updated_data['qualification'],
            'tech_skills' => $updated_data['tech_skills'],
            'description' => $updated_data['description'],
        ];
        if(isset($updated_data['profile_pic'])){
            $data['pic_name'] = $updated_data['profile_pic'];
        }
        if(isset($updated_data['sign_pic'])) {
            $data['sign_pic_name'] = $updated_data['sign_pic'];
        }
        return $this->db->table('tbl_user')->where(['id' => $user_id])->update($data);
    }

    public function deleteUser($user_id){
        return $this->db->table('tbl_user')->where(['id' => $user_id])->delete();
    }

    public function getCountry()
    {
        return $this->db->table('tbl_country')->get()->getResult();
    }
    public function getCountryById($id)
    {
        return $this->db->table('tbl_country')->where(['id' => $id])->get()->getResult();
    }
    public function getStateById($id)
    {
        return $this->db->table('tbl_state')->where(['id' => $id])->get()->getResult();
    }
    public function getCityById($id)
    {
        return $this->db->table('tbl_city')->where(['id' => $id])->get()->getResult();
    }

    public function getState()
    {
        return $this->db->table('tbl_state')->get()->getResult();
    }

    public function getCity()
    {
        return $this->db->table('tbl_city')->get()->getResult();
    }

    public function getSelectedStateByCountry($user_id, $country_id)
    {
        return $this->db->table('tbl_user')->where(['id' => $user_id, 'country_id' => $country_id])->get()->getResult();
    }
    public function getStateByCountry($country_id)
    {
        return $this->db->table('tbl_state')->where(['country_id' => $country_id])->get()->getResult();
    }
    public function getSelectedCityByStateAndCountry($user_id, $country_id, $state_id)
    {
        return $this->db->table('tbl_user')->where(['id' => $user_id, 'country_id' => $country_id, 'state_id' => $state_id])->get()->getResult();
    }
    public function getCityByStateAndCountry($country_id, $state_id)
    {
        return $this->db->table('tbl_city')->where(['country_id' => $country_id, 'state_id' => $state_id])->get()->getResult();
    }
    public function getTechSkills()
    {
        return $this->db->table('tbl_tech_skills')->get()->getResult();
    }
}

