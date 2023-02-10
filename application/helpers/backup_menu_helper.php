<?php 

function sub_menu($id){
	$CI =& get_instance();
	
	$sub_menu = $CI->db->query("select * from menu where menu_parent='$id' order by menu_urutan asc")->result();
	
	foreach($sub_menu as $m){ 
		?>
		<br>
		<div class="list-group no-margin">
			<div class="list-group-item">

				<div class="pull-right">
					<a href="<?php echo base_url().'dashboard/menu_edit/'.$m->menu_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
					<a href="<?php echo base_url().'dashboard/menu_hapus/'.$m->menu_id; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
				</div>
				<div>
					<b><?php echo $m->menu_nama ?></b>
					<br>
					<i><?php echo $m->menu_url ?></i>
					<br>
					Induk : <b><?php nama_menu($m->menu_parent) ?></b> | Urutan : <b><?php echo $m->menu_urutan ?></b> |
					<small class="badge"><?php if($m->menu_opentab == "y"){ echo "Buka di tab baru"; } ?></small>
				</div>

				<?php sub_menu($m->menu_id); ?>

			</div>
		</div>
		<?php
	}

}


function nama_menu($id){
	$CI =& get_instance();
	$where = array(
		'menu_id' => $id
	);

	
	if($id == 0){
		echo "-";
	}else{
		$query = $CI->db->query("SELECT * FROM menu where menu_id='$id'");
		$ret = $query->row();
		echo $ret->menu_nama;
	}

}


// menu depan
function menu(){

	$CI =& get_instance();
	
	$menu = $CI->db->query("select * from menu where menu_parent='0' order by menu_urutan asc")->result();
	?>
	<ul class="navbar-nav">
		<?php
		foreach($menu as $m){ 

			$id = $m->menu_id;
			$submenu = $CI->db->query("select * from menu where menu_parent='$id' order by menu_urutan asc");

			?>

			<li class="nav-item <?php if($submenu->num_rows() > 0){ echo 'dropdown'; } ?>">
				<a <?php if($m->menu_opentab == "y"){echo "target='_blank'";} ?> class="nav-link js-scroll" href="<?php echo $m->menu_url; ?>"><?php echo $m->menu_nama; ?> <?php if($submenu->num_rows() > 0){echo "<i class='fa fa-chevron-down'></i>"; } ?> </a>

				<?php 
				if($submenu->num_rows() > 0){
					menu_anak($id);
				}
				?>

			</li>

			<?php
		}

		?>
	</ul>
	<?php

}


function menu_anak($id){

	$CI =& get_instance();
	
	$menu = $CI->db->query("select * from menu where menu_parent='$id' order by menu_urutan asc")->result();
	?>
	<ul>
		<?php
		foreach($menu as $m){ 

			$id_x = $m->menu_id;
			$submenu = $CI->db->query("select * from menu where menu_parent='$id_x' order by menu_urutan asc");

			?>

			<li class="<?php if($submenu->num_rows() > 0){ echo 'dropdown'; } ?>">
				<a <?php if($m->menu_opentab == "y"){echo "target='_blank'";} ?> href="<?php echo $m->menu_url; ?>"><?php echo $m->menu_nama; ?> <?php if($submenu->num_rows() > 0){echo "<i class='fa fa-chevron-left'></i>"; } ?> </a>

				<?php 
				if($submenu->num_rows() > 0){
					menu_anak($id_x);
				}
				?>

			</li>

			<?php
		}

		?>
	</ul>
	<?php

}


?>






