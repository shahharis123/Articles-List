<?php  
class Admin extends MY_Controller{
    public function dashboard(){
        $this->load->library('pagination');
        $config = array(
            'base_url'       =>    base_url('admin/dashboard'),
            'per_page'       =>    5,
            'total_rows'     =>    $this->articlesmodel->num_rows()   
        );
        $config['attributes'] = array('class' => 'page-link');
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>'; 
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

        $this->pagination->initialize($config);
        $articles = $this->articlesmodel->articles_list($config['per_page'], $this->uri->segment(3, 0));
        $this->load->view('admin/dashboard', array('articles'=>$articles));

    }
    public function add_article(){
        $this->load->view('admin/add_article');
    }
    public function store_article(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run('add_article_rules')){
          $post = $this->input->post();
          unset($post['submit']);
          return $this->_flashAndRedirect(
            $this->articlesmodel->add_article($post),
             'Article added successfully.',
              'Article failed to add. Please try again.'
          );
        }
        else{
            $this->load->view('admin/add_article');
        }
    }
    public function edit_article($article_id){
        $article = $this->articlesmodel->find_article($article_id);
        $this->load->view('admin/edit_article', array('article'=>$article));

    }
    public function update_article(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run('add_article_rules')){
          $post = $this->input->post();
          $article_id = $post['article_id'];
          unset($post['submit'], $post['article_id']);
          return $this->_flashAndRedirect(
              $this->articlesmodel->update_article($article_id, $post),
               'Article updated successfully.',
                'Article failed to update. Please try again.'
            );
        }
        else{
            $post = $this->input->post();
            $article_id = $post['article_id'];
            $article = $this->articlesmodel->find_article($article_id);
            $this->load->view('admin/edit_article', array('article'=>$article));
        }

}
    public function delete_article(){
        $article_id = $this->input->post('article_id');
        return $this->_flashAndRedirect(
              $this->articlesmodel->delete_article($article_id),
               'Article deleted successfully.',
                'Article failed to delete. Please try again.'
             );
        }
    public function __construct(){
        parent::__construct();
        if( ! $this->session->userdata('user_id')){
            return redirect('login');
        }  
        $this->load->model('articlesmodel');
        $this->load->helper('form');
    }
    private function _flashAndRedirect($successful, $successMessage, $failureMessage){
        if($successful){
            $this->session->set_flashdata('feedback', $successMessage);
            $this->session->set_flashdata('feedback_class', 'alert-success');
          }
          else{
            $this->session->set_flashdata('feedback', $failureMessage);
            $this->session->set_flashdata('feedback_class', 'alert-danger');
          }
          return redirect('admin/dashboard');
          }
    }