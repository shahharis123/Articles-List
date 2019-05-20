<?php
class Articlesmodel extends CI_Model{
    public function articles_list($limit, $offset){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->select(array('title', 'id'))
                          ->from('articles')
                          ->where('user_id', $user_id)
                          ->limit($limit, $offset)
                          ->get();
        return $query->result();
    }
    public function all_articles_list($limit, $offset){
        $query = $this->db->select(array('title', 'id', 'created_at'))
                          ->from('articles')
                          ->limit($limit, $offset)
                          ->order_by('created_at', 'DESC')
                          ->get();
        return $query->result();
    }
    public function count_all_articles(){
        $query = $this->db
                          ->select(array('title', 'id', 'created_at'))
                          ->from('articles')
                          ->get();
        return $query->num_rows();
    }
    public function num_rows(){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->get_where('articles', array('user_id'=>$user_id));
        return $query->num_rows();
    }
    public function add_article($array){
        return $this->db->insert('articles', $array);

    }
    public function find_article($article_id){
        $q = $this->db->select(array('id', 'title', 'body'))
                 ->where('id', $article_id)
                 ->get('articles');  
        return $q->row();
    }
    public function update_article($article_id, Array $article){
        return $this->db
                        ->where('id', $article_id)
                        ->update('articles', $article);
    }
    public function delete_article($article_id){
        return $this->db->delete('articles', array('id'=>$article_id));
    }
    public function search($query, $limit, $offset){
        $q = $this->db->from('articles')
                      ->like('title', $query)
                      ->limit($limit, $offset)
                      ->get();
        return $q->result();                
    }
    public function count_search_results($query){
        $q = $this->db->from('articles')
                      ->like('title', $query)
                      ->get();
        return $q->num_rows();
    }
    public function find($id){
        $q = $this->db->get_where('articles', array('id'=>$id));
        if($q->num_rows()){
            return $q->row();
        }
        else{
            return FALSE;
        }
    }
}