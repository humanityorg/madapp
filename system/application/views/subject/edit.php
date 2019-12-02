<?php $this->load->view('layout/thickbox_header');
$months = array('nothing', 'Jan', 'Feb', 'March', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
$subject_id = 0;
$name = '';

if(!empty($subject)) {
	$subject_id = $subject->id;
	$name = $subject->name;
}
?>
<script type="text/javascript" src="<?php echo base_url()?>css/datetimepicker_css.js"></script>
<h2><?php echo $name ?> Subject</h2>

<form id="formEditor" action="<?php echo site_url('subject/save'); ?>" class="mainForm" method="post">
<ul class="form">
<li><label for="name">Name</label>
<input type="text" name="name" value="<?php echo $name ?>" /></li>

</ul>
<input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" />
<input id="btnSubmit" class="button green" type="submit" value="Save"></input>
</form>

<?php $this->load->view('layout/thickbox_footer'); ?>