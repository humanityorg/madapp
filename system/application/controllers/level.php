<?php
class Level extends Controller {
	private $message;
	
	function Level() {
		parent::Controller();
		$this-> message = array('success'=>false, 'error'=>false);
		
		$this->load->library('session');
        $this->load->library('user_auth');
		$logged_user_id = $this->session->userdata('id');
		if($logged_user_id == NULL ) {
			redirect('auth/login');
		}
	
		$this->load->model('Level_model','model', TRUE);
		$this->load->model('kids_model');
		$this->load->model('center_model', 'center_model');
		$this->load->helper('url');
	}
	
	function index($holder='', $center_id = 0) {
		$this->user_auth->check_permission('level_index');
		
		if(!is_numeric($center_id) or !$center_id) {
			show_error("Choose a center.");
		}
		$all_levels = $this->model->get_all_levels_in_center($center_id);
		$center = $this->center_model->get_info($center_id)[0];

		$this->load->view('level/index', array(
				'all_levels'	=> $all_levels,
				'center_name'	=> $center->name, 
				'center'		=> $center,
				'center_id'		=> $center_id,
				'project_id'	=> $this->model->project_id
			));
	}
	
	function create($holder, $center_id = 0) { 
		$this->user_auth->check_permission('level_create');
		$center = $this->center_model->get_info($center_id)[0];
		
		if($this->input->post('action') == 'Create') {
			$this->model->create(array(
					'name'		=>	$this->input->post('name'),
					'center_id'	=>	$this->input->post('center_id'),
					'medium'	=>	$this->input->post('medium'),
					'preferred_gender'	=>	$this->input->post('preferred_gender'),
					'students'	=>	$this->input->post('students'),
					'grade'		=>  $this->input->post('grade'),
				));
				
			$this->session->set_flashdata('success', 'The Class Section has been added');
			
			redirect('level/index/center/' . $this->input->post('center_id'));
		
		} else {
			$this->load->helper('misc');
			$this->load->helper('form');
			
			$kids = idNameFormat($this->kids_model->getkids_name_incenter($center_id)->result());
			$title = 'Class Section';
			$default_grade = 5;
			if($center->type == 'aftercare') {
				$title = "SSG";
				$default_grade = 13;
			}


			$this->load->view('level/form.php', array(
				'action'	=> 'Create',
				'center_id'	=> $center_id,
				'center_name'=>$center->name,
				'center'	=> $center,
				'title'		=> 'Class Section',
				'level'		=> array(
					'id'		=> 0,
					'name'		=> '',
					'center_id'	=> $center_id,
					'kids'		=> $kids,
					'medium'	=> 'english',
					'preferred_gender' => 'any',
					'selected_students'=> array(),
					'grade'		=> $default_grade,
					)
				));
		}
	}
	
	function edit($level_id) {
		$this->user_auth->check_permission('level_edit');
		$center = $this->center_model->get_info($center_id)[0];

		if($this->input->post('action') == 'Edit') {
			$this->model->edit($level_id, array(
				'name'		=>	$this->input->post('name'),
				'center_id'	=>	$this->input->post('center_id'),
				'medium'	=>	$this->input->post('medium'),
				'preferred_gender'	=>	$this->input->post('preferred_gender'),
				'students'	=>	$this->input->post('students'),
				'grade'		=>  $this->input->post('grade')
			));

			$this->session->set_flashdata('success', 'The Class Section has been edited successfully');
			redirect('level/index/center/' . $this->input->post('center_id'));
		} else {
		
			$this->load->helper('misc');
			$this->load->helper('form');
			
			$level = $this->db->where('id',$level_id)->get('Level')->row_array();
			$center_id = $level['center_id'];
			$center_name = $this->center_model->get_center_name($center_id);
			
			$all_kids = idNameFormat($this->kids_model->get_kids_name($center_id)->result());
			$level['selected_students'] = array_keys($this->model->get_kids_in_level($level_id));

			$level['kids'] = array();
			foreach($level['selected_students'] as $kid_id) {
				$level['kids'][$kid_id] = $all_kids[$kid_id];
			}
			foreach($all_kids as $kid_id=>$kid_name) {
				if(!isset($level['kids'][$kid_id])) {
					$level['kids'][$kid_id] = $kid_name;
				}
			}
			
			$this->load->view('level/form.php', array(
				'action' 	=> 'Edit',
				'title'		=> 'Class Section',
				'center_id'	=> $center_id,
				'center_name'=> $center_name,
				'center'	=> $center,
				'level'		=> $level,
				));
		}
	}
	
	function delete($level_id) {
		$this->user_auth->check_permission('level_delete');
		$this->load->model('batch_model');
		
		//Make sure the level don't have any batches under it.
		$batches = $this->batch_model->get_batches_in_level($level_id);
		if($batches) {
			show_error("This class section has batches under it. You can only delete class sections that have no batches. Go to Manage Center > Batch/Class Assignment page to remove connections to this level before trying to delete again.");
		}
		$level_center = $this->db->select('center_id')->where('id', $level_id)->get('Level')->row();
		
 		$this->db->set('status', '0')->where('id', $level_id)->update('Level');
 		$this->db->delete('StudentLevel', array('level_id'=>$level_id));
		$this->session->set_flashdata('success', 'The class section has been deleted successfully');
		redirect('level/index/center/' . $level_center->center_id);
	}
	
	/**
    * Function to update_student
    * @author : Rabeesh
    * @param  : []
    * @return : type : []
    **/
	function update_student()
	{
		$level = $_REQUEST['level'];
		$agents = $_REQUEST['agents'];
		$agents = str_replace("on,","",$agents);
		$agents = substr($agents,0,strlen($agents)-1);
		$explode_agents_array = explode(",",trim($agents));
		for($i=0;$i<sizeof($explode_agents_array);$i++) {
			$agent_id = $explode_agents_array[$i];				
			$this->kids_model->kids_level_update($agent_id,$level);
	   }
	}
}
