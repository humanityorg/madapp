<link href="<?php echo base_url(); ?>css/dashboard.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/libraries/ajaxify.js"></script>

<div id="content" class="container-fluid">
<div id="main" class="board transparent-container">

<h1 class="title">Ed Support</h1><br>

	<!--<div id="head" class="clear" style="border-bottom:none;">
	<div style="font-size:14px;background-color:#FFF89D;height:15px;padding-top:18px;padding-bottom:20px;padding-left:10px;">
		Welcome, <a class="popup" href="<?php /*echo site_url('user/view/'.$current_user->id); */?>"><?php /*echo $this->session->userdata('name'); */?></a>.
			<?php /*if(in_array(9, array_keys($this->session->userdata('groups')))) { */?>Current Credits: <strong><?php /*echo $current_user->credit */?></strong>.<?php /*} */?>
			<?php /*if(in_array(14, array_keys($this->session->userdata('groups')))) { */?>Admin Credits: <strong><?php /*echo $current_user->admin_credit */?></strong>.<?php /*} */?>
			</div>
	</div><br />-->

<?php if($upcomming_classes) {
foreach($upcomming_classes as $class) { ?>
<div class="upcomming">You have a class at <strong><?php echo $class->name ?></strong> on <?php echo date('M d\<\s\u\p\>S\<\/\s\u\p\>(D), h:i A', strtotime($class->class_on)) ?>. 
	<a href="<?php echo site_url('classes/edit_class/'.$class->id); ?>">Substitute</a></div>
<?php } 
} 

if($this->user_auth->get_permission('user_edit_bank_details')) {
    if(!$bank_details_all) {
    ?>
<div class="upcomming">Please enter your <a href="<?php echo site_url('user/edit_bank_details/'); ?>" class="popup">Bank Details</a></div>
<?php }
} ?>
	
<div id="quick">
    <div class="row">

            <?php if($this->user_auth->get_permission('city_index')) { ?>
                <h2 class="sub-title">National</h2>
                <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('city/') ?>">
                        <img src="<?php echo base_url(); ?>images/flat_ui/cities.png" alt="" /><br> Cities</a></div>
            <?php } ?>

            <?php if($this->user_auth->get_permission('project_index')) { ?>
                <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('project/manage_project') ?>">
                        <img src="<?php echo base_url(); ?>images/flat_ui/projects.png" alt="" /> <br>Projects</a></div>
            <?php } ?>


    </div>

    <div class="row">

        <?php if($this->user_auth->get_permission('classes_madsheet')) { ?>
            <h2 class="sub-title">Center</h2>
        <?php } ?>

        <?php if($this->user_auth->get_permission('center_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('center/manageaddcenters') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/centers.png" alt="" /> <br>Centers</a></div>
        <?php } ?>



        <?php if($this->user_auth->get_permission('classes_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('classes/') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/classes.png" alt="" /> <br>Classes</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('classes_madsheet')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('classes/madsheet') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/mad_sheet.png" alt="" /> <br>MAD Sheet</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('classes_batch_view')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('classes/batch_view') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/batch_view.png" alt="" /> <br>Batch View</a></div>
        <?php } ?>
    </div>
	

	
    <div class="row">

        <?php if($this->user_auth->get_permission('kids_index')) { ?>
            <h2 class="sub-title">People</h2>
        <?php } ?>


        <?php if($this->user_auth->get_permission('kids_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('kids/manageaddkids') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/kids.png" alt="" /> <br>Kids</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('user_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('user/view_users') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/volunteers.png" alt="" /> <br>Volunteers</a></div>
        <?php } ?>

    </div>


	
	
<!--	<?php /*if($this->user_auth->get_permission('exam_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('exam/manage_exam') */?>">
	<img src="<?php /*echo base_url(); */?>images/flat_ui/exams.png" alt="" /> <br>Exams</a></div>
	<?php /*} */?>
	
	<?php /*if($this->user_auth->get_permission('exam_marks_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('exam/view_exam_events') */?>">
	<img src="<?php /*echo base_url(); */?>images/flat_ui/exam_marks.png" alt="" /> <br>Exam Marks</a></div>
	--><?php /*} */?>
		

	<div class="row">

        <?php if($this->user_auth->get_permission('user_credithistory')) { ?>
            <h2 class="sub-title">Report</h2>
        <?php } ?>

        <?php if($this->user_auth->get_permission('report_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('report/') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/reports.png" alt="" /> <br>Reports</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('national_dashboard')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('national_dashboard/footprint_table_of_all_cities') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/cities.png" alt="" /> <br>National Reports</a></div>
        <?php } ?>

        <br />

        <?php if($this->user_auth->get_permission('user_credithistory')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('user/credithistory') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/credit_history.png" alt="" /> <br>Credit History</a></div>
        <?php } ?>

	</div>

    <div class="row">

        <?php if($this->user_auth->get_permission('user_group_index')) { ?>
            <h2 class="sub-title">Setting</h2>
        <?php } ?>

        <?php if($this->user_auth->get_permission('setting_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('settings/index') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/settings.png" alt="" /> <br>Settings</a></div>
        <?php } ?>



        <?php if($this->user_auth->get_permission('event_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('event/event') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/events.png" alt="" /> <br>Event</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('user_group_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('user_group/manageadd_group') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/user_groups.png" alt="" /> <br>User Groups</a></div>
        <?php } ?>

        <?php if($this->user_auth->get_permission('permission_index')) { ?>
            <div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php echo site_url('permission/manage_permission') ?>">
                    <img src="<?php echo base_url(); ?>images/flat_ui/permissions.png" alt="" /> <br>Permissions</a></div>
        <?php } ?>
    </div>


<!--    <?php /*if($this->user_auth->get_permission('books_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('books/manage_books') */?>">
	<img src="<?php /*echo base_url(); */?>images/flat_ui/cities.png" alt="" /> <br>Books</a></div>
	<?php /*} */?>
	
    <?php /*if($this->user_auth->get_permission('chapters_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('books/manage_chapters') */?>">
	<img src="<?php /*echo base_url(); */?>images/flat_ui/cities.png" alt="" /> <br>Chapters</a></div>
	--><?php /*} */?>

        	
<!--	<?php /*if($this->user_auth->get_permission('task_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('task/index') */?>">
	<img src="<?php /*echo base_url(); */?>images/ico/task.png" alt="" /> <br>Task</a></div>
	<?php /*} */?>
    <?php /*if($this->user_auth->get_permission('admincredit_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('admincredit/index') */?>">
	<img src="<?php /*echo base_url(); */?>images/ico/credit.png" alt="" /> <br>Admin Credits</a></div>
	<?php /*} */?><br />
	
	<?php /*if($this->user_auth->get_permission('comps_view')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="http://makeadiff.in/apps/comps/points.php?competition_id=11&amp;city_id=<?php /*echo $this->session->userdata('city_id'); */?>">
	<img src="<?php /*echo base_url(); */?>images/ico/comps.png" alt="" /> <br>WeDoist Comps</a></div>
	
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="http://makeadiff.in/apps/comps/?competition_id=11">
	<img src="<?php /*echo base_url(); */?>images/ico/add_points.png" alt="" /> <br>WeDoist Comps Points</a></div>
	<?php /*} */?>
	
	<?php /*if($this->user_auth->get_permission('placement_index')) { */?>
	<div class="col-md-3 col-sm-6 text-center"> <a  class='btn btn-primary btn-dash' href="<?php /*echo site_url('placement/placement_view') */?>">
	<img src="<?php /*echo base_url(); */?>images/ico/add_points.png" alt="" /> <br>Placement</a></div>
	--><?php /*} */?>


	<br /><br /><br />
</div>
</div>
</div>



