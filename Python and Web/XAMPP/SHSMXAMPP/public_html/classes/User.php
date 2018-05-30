<?php

class User {
    private $_db,
            $_data,
            $_perms,
            $_sessionName,
            $_cookieName,
            $isLoggedIn;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('sessions/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if(!$user) {
            if(Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    Redirect::to('index.php');
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array(),$perm = array()) {

        if(!$this->_db->insert('login', $fields))  {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
        if($fields["Teacher"] == 0){
          $this->_db->insert('studentperms',$perm);
        }
        else{
          $this->_db->insert('teacherperms',$perm);
        }

    }

    public function update($fields = array(), $id = null) {

        if(!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if(!$this->_db->update('login', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }


    public function find($user = null) {
      $pass = false;
        if($user) {
            $field = 'ID';
            $data = $this->_db->get('login', array($field, '=', $user));
            if($data->count()) {
                $this->_data = $data->first();
                $pass = true;
            }
            if($this->_data->Teacher == 0){
              $perm = $this->_db->get('studentperms',array('id',"=",$user));
            }
            else{
              $perm = $this->_db->get('teacherperms',array('id',"=",$user));
            }

            if($perm->count()){
                $this->_perms = $perm->first();
            }
            return $pass;
        }
        return false;
    }
    public function login($username = null, $password = null, $remember = false) {
        if(!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if (password_verify($password,$this->data()->password)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }

    public function hasPermission($key) {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            return !empty($permissions[$key]);
        }

        return false;
    }

    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout() {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }
    public function perms(){
      return $this->_perms;
    }
    public function removeUser($id){
      $this->_db->delete('login',array('id','=',$id));
      foreach($this->perms() as $key => $data){
        if($key != "ID" && $key != "Admin"){
          $this->_db->delete($key . 'mandatorycerts',array('ID','=',$id));
        }
      }
      $this->_db->delete('courses',array('id','=',$id));
      $this->_db->delete('studentperms',array('ID','=',$id));
      $this->_db->delete('teacherperms',array('ID','=',$id));

    }
}
