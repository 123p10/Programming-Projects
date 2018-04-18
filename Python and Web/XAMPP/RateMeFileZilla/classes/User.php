<?php
 
class User {
    private $_db,
            $_data,
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
                    logout();
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
    }

    public function update($fields = array(), $id = null) {

        if(!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false) {
        if(!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);
                    echo "Success";
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
                echo "Failure";
                echo $this->data()->password . " " . Hash::make($password, $this->data()->salt);
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
	
	public function hasRated($user){
		$arr = $this->_db->get('ratings', array('client_user', '=', "'" . $user->data()->username . "'", " and sender_user='" . $this->_data->username . "'"));
		if(($arr->count()) > 0){
			return true;
		}
		return false;
	}
	public function rate($user,$rating){
		if(!$this->_db->insert('ratings', array(
		'sender_user' => $this->_data->username,
		'client_user' => $user,
		'rating' => $rating
		))){
			echo "shit";
		}
	}
	public function getRatings($user){
		$arr = $this->_db->get('ratings', array('client_user', '=', $user->data()->username));
		if($arr->count() > 0){
			return $arr;
		}
		return false;
	}
	public function updateRating($user){
		if($user->getRatings($user) !== false){
			$i = 0;
			$sum = 0;
			foreach ($user->getRatings($user)->results() as $row) {
				$sum += $row->rating;
				$i++;
			}
			$sum /= $i;
			$this->_db->update('users', $user->data()->id, array('rating' => $sum));
		}
	}
	public function getRating($user){
		return $user->_data->rating;
	}
	public function numberofRated(){
		$arr = $this->_db->get('ratings', array('sender_user', '=', $this->_data->username ));
		
		if($arr->count() > 0){
			return $arr->count();
		}
		return 0;

	}

	
}