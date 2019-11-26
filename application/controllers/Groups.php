<?php 

class Groups extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Groups';
		

		$this->load->model('model_groups');
		$this->load->model('model_users');
	}

	public function list_groups($start =0)
	{
		if(!in_array('viewGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
		}
		$this->load->library('pagination');
		$config['base_url'] = base_url().'groups/list_groups/';
		$config['total_rows'] = $this->model_users->count_all('groups');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close']  ='</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$cofig['prev_link'] = "<i class='fa fa-long-arrow-left'></i>Prev";
        $cofig['next_link'] = "<i class='fa fa-long-arrow-right'></i>Next";
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$this->data['pagination'] =$this->pagination->create_links();		
		$groups_data = $this->model_groups->getGroupData($start,$config['per_page']);
		$this->data['groups_data'] = $groups_data;

		$this->render_template('groups/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('group_name', 'Group name', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
            
        	$data = array(
        		'group_name' => $this->input->post('group_name'),
        		'permission' => $permission
        	);

        	$create = $this->model_groups->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('groups/list_groups', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('groups/create', $this->data);
        }	

		
	}

	public function edit($id = null)
	{
		if(!in_array('updateGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {

			$this->form_validation->set_rules('group_name', 'Group name', 'required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);

	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('groups/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/edit/'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->render_template('groups/edit', $this->data);	
	        }	
		}

		
	}

	public function delete($id)
	{
		if(!in_array('deleteGroup', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			if($this->input->post('confirm')) {

				$check = $this->model_groups->existInUserGroup($id);
				if($check == true) {
					$this->session->set_flashdata('error', 'Group exists in the users');
	        		redirect('groups/', 'refresh');
				}
				else {
					$delete = $this->model_groups->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('groups/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('groups/delete/'.$id, 'refresh');
		        	}
				}	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('groups/delete', $this->data);
			}	
		}
	}


}