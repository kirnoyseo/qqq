<?php

class DBManager
{
    public $db;

    public function __construct(MysqliDb $db)
    {
        $this->db = $db;
    }

    public function isUser($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        if (isset($result['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($user_id)
    {
        $db = $this->db;
        $content = array('user_id' => $user_id);
        $id = $db->insert('users', $content);
        return $id;
    }

    public function getCmd($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['cmd'];
    }

    public function setCmd($user_id, $cmd)
    {
        $db = $this->db;
        $content = array('cmd' => $cmd);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getPhoto($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['photo'];
    }

    public function setPhoto($user_id, $photo)
    {
        $db = $this->db;
        $content = array('photo' => $photo);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getBtns($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['btns'];
    }

    public function setBtns($user_id, $btns)
    {
        $db = $this->db;
        $content = array('btns' => $btns);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getResp($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['photo'];
    }

    public function setResp($user_id, $photo)
    {
        $db = $this->db;
        $content = array('photo' => $photo);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getCaption($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['caption'];
    }

    public function setCaption($user_id, $cap)
    {
        $db = $this->db;
        $content = array('caption' => $cap);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getTrueAlert($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['alert_true'];
    }

    public function setTrueAlert($user_id, $alert)
    {
        $db = $this->db;
        $content = array('alert_true' => $alert);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getFalseAlert($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['alert_false'];
    }

    public function setFalseAlert($user_id, $alert)
    {
        $db = $this->db;
        $content = array('alert_false' => $alert);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getBtnTrue($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('users');
        return $result['btn_true'];
    }

    public function setBtnTrue($user_id, $btn_true)
    {
        $db = $this->db;
        $content = array('btn_true' => $btn_true);
        $db->where('user_id', $user_id)->update('users', $content);
    }

    public function getAllInfo($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->get('users');
        return $result;
    }

    #####################CHANNELS#################CHANNELS#################CHANNELS#####################################

    public function getChannels()
    {
        $db = $this->db;
        $result = $db->get('channels');
        return $result;
    }


    public function getChId($user_id)
    {
        $db = $this->db;
        $result = $db->where('user_id', $user_id)->getOne('channels');
        return $result['btn_true'];
    }

    public function setChId($user_id, $btn_true)
    {
        $db = $this->db;
        $content = array('btn_true' => $btn_true);
        $db->where('user_id', $user_id)->update('channels', $content);
    }

    public function addCh($ch_id, $ch_name)
    {
        $db = $this->db;
        $content = array('ch_id' => $ch_id, 'name' => $ch_name);
        $db->insert('channels', $content);
    }

    public function delCh($ch_id)
    {
        $db = $this->db;
        $db->where('ch_id', $ch_id)->delete('channels');
    }

    public function isCh($ch_id)
    {
        $db = $this->db;
        $result = $db->where('ch_id', $ch_id)->getOne('channels');
        if (isset($result['id'])) {
            return true;
        } else {
            return false;
        }
    }


    #############POSTS########################POSTS####################POSTS##########################POSTS#############

    public function addPost($alert_true, $alert_false, $btn_true, $ch_id)
    {
        $db = $this->db;
        $content = array('alert_true' => $alert_true, 'alert_false' => $alert_false, 'btn_true' => $btn_true,
            'ch_id' => $ch_id);
        $id = $db->insert('posts', $content);
        return $id;
    }

    public function getTrueAlertPost($post_id)
    {
        $db = $this->db;
        $result = $db->where('id', $post_id)->getOne('posts');
        return $result['alert_true'];
    }

    public function getFalseAlertPost($post_id)
    {
        $db = $this->db;
        $result = $db->where('id', $post_id)->getOne('posts');
        return $result['alert_false'];
    }

    public function getBtnTruePost($post_id)
    {
        $db = $this->db;
        $result = $db->where('id', $post_id)->getOne('posts');
        return $result['btn_true'];
    }

    public function getRespPost($post_id)
    {
        $db = $this->db;
        $result = $db->where('id', $post_id)->getOne('posts');
        return $result['resp'];
    }

    public function setRespPost($post_id, $resp)
    {
        $db = $this->db;
        $content = array('resp' => $resp);
        $db->where('id', $post_id)->update('posts', $content);
    }

}