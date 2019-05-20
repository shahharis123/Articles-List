<?php
class User extends MY_Controller{
    public function index(){
        $this->load->helper('form');
        $this->load->model('articlesmodel');
        $this->load->library('pagination');
        $config = array(
            'base_url'       =>    base_url('user/index'),
            'per_page'       =>    5,
            'total_rows'     =>    $this->articlesmodel->count_all_articles()   
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
        $articles = $this->articlesmodel->all_articles_list($config['per_page'], $this->uri->segment(3, 0));
        $this->load->helper('html'); 
        $this->load->view('public/articles_list', compact('articles'));
    }
    public function search(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('query', 'Search', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if(! $this->form_validation->run()){
           return $this->index();
        }
        else{
            $query = $this->input->post('query');
            return redirect("user/search_results/$query");
            // $this->load->model('articlesmodel');
            // $articles = $this->articlesmodel->search($query);
            // $this->load->view('public/search_results', compact('articles'));
        }
    }
    public function search_results($query){
        $this->load->helper('form');
        $this->load->model('articlesmodel');
        $this->load->library('pagination');
        $config = array(
            'base_url'       =>    base_url("user/search_results/$query"),
            'per_page'       =>    5,
            'total_rows'     =>    $this->articlesmodel->count_search_results($query)   
        );
        $config['attributes'] = array('class' => 'page-link');
        $config['uri_segment'] = 4;
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
        $articles = $this->articlesmodel->search($query, $config['per_page'], $this->uri->segment(4, 0));
        $this->load->helper('html'); 
        $this->load->view('public/search_results', compact('articles'));
    }
    public function article($id){
        $this->load->helper('form');
        $this->load->model('articlesmodel');
        $article = $this->articlesmodel->find($id);
        $this->load->view('public/article_detail', compact('article'));
    }
}