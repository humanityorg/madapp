<div id="content" class="clear">

<div id="main" class="clear">
<div id="head" class="clear">
<h1><?php echo $title; ?></h1>

<div id="actions"> 
<a href="<?php echo site_url('user/popupAdduser')?>" class="thickbox button primary popup" name="Add User">Add User</a>
</div>
</div>

<form action="" method="post">
<table style="margin-bottom:25px;">
<tr>
<td style="vertical-align:top;"><div class="field clear">
		<label for="city_id">Select City </label>
		<select name="city_id" id="city_ih">
		<option value="0">Any City</option>
		<?php
		$city=$all_cities->result_array();
		foreach($city as $row) { ?>
		<option value="<?php echo $row['id']; ?>" <?php 
			if(!empty($city_id) and $city_id == $row['id']) echo 'selected="selected"';
		?>><?php echo $row['name']; ?></option>
		<?php } ?>
		</select>
		<p class="error clear"></p> 
		</div>
</td>
		
<td style="vertical-align:top;"><div  class="field clear" style="margin-left:20px; margin-bottom:10px;">
		<label for="user_group">Group </label>
		
		<select name="user_group[]" id="user_group" style="width:150px; height:100px;" multiple>
		<?php
		$group = $all_user_group->result_array();
		foreach($group as $row) { ?>
		<option value="<?php echo $row['id']; ?>"<?php 
			if(in_array($row['id'], $user_group)) echo 'selected="selected"';
		?>><?php echo $row['name']; ?></option>
		<?php } ?>
		</select>
		<p class="error clear"></p>
		</div>
</td>
	<td style="vertical-align:top;"><div  class="field clear" style="margin-left:20px;">
		<label for="name">Name</label>
		<input name="name" id="name" type="text" value="<?php echo $name ?>">
		<p class="error clear"></p>
		</div>
</td>
<td style="vertical-align:bottom;"><div  class="field clear" style="margin-left:20px;">
<input type="submit" value="Get User"/>
</div>
</td>                                     
</tr>
</table>
</form>

<table cellpadding="0"  cellspacing="0" class="clear" id="tableItems">
<thead>
<tr>
	<th class="colCheck1">Id</th>
	<th class="colName left sortable">Name</th>
    <th class="colStatus sortable">Email</th>
    <th class="colStatus">Mobile No</th>
    <th class="colPosition">City</th>
    <th class="colPosition">User Type</th>
    <th class="colActions">Actions</th>
</tr>
</thead>
<tbody>

<?php 
$count = 0;
foreach($all_users as $id => $user) {
	$count++;
	$shadeClass = 'even';
	if($count % 2) $shadeClass = 'odd';
?> 
<tr class="<?php echo $shadeClass; ?>" id="group">
    <td class="colCheck1"><?php echo $user->id; ?></td>
    <td class="colName left"><?php echo $user->name; ?></td>
    <td class="colCount"><?php echo $user->email; ?></td> 
    <td class="colStatus" style="text-align:left"><?php echo $user->phone; ?></td>
    <td class="colPosition"><?php echo $user->city_name; ?></td>
    <td class="colPosition"><?php echo ucfirst($user->user_type); ?></td>
    
    <td class="colActions right"> 
    <a href="<?php echo site_url('user/popupEditusers/'.$user->id); ?>" class="thickbox icon edit popup" name="Edit User : <?php echo $user->name ?>">Edit</a>
    <a class="delete confirm icon" href="<?php echo site_url('user/delete') ?>">Delete</a>
    </td>
</tr>

<?php }?>
</tbody>
</table>

<?php if(!$count) echo "<div style='background-color: #FFFF66;height:30px;text-align:center;padding-top:10px;font-weight:bold;' >- no records found -</div>"; ?>

</div>
<br /><br />

<a class="with-icon add" href="<?php echo site_url('user/import'); ?>">Import Users...</a>

</div>
