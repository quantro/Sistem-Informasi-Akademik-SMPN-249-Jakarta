<?php 
require("../check.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Sistem Informasi Akademik</title>
		<?php require("favicon.php");
		?>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="../assets/css/ace.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<?php require("upbar.php");
				?><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<!--#sidebar-shortcuts-->
				<?php require("sidebar.php");
				?>
				<!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
                
				<?php require("atas.php");
				?>
                <!--.breadcrumb-->

				
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<div class="page-header ">
						<h1>
							Input
							<small>
								<i class="icon-double-angle-right"></i>
								Nilai
							</small>
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<form class="form-horizontal" action="proses/proses-input-nilai.php" method="post" />
								
                                <div class="control-group">
									<label class="control-label" for="form-field-0">Mata Pelajaran</label>
                                    <div class="controls">
										<?php 
										$mp=$_POST['form-field-mapel'];
										
										$sql=mysql_query("SELECT * from tbl_mapel WHERE id='$mp'");
										while($mpl=mysql_fetch_array($sql))
											{
												echo "<input readonly type='text' value='$mpl[nama_mapel]' />";
												echo "<input readonly type='text' name='form-field-mapel' id='form-field-mapel' value='$mp' style='display:none'  />";
											}
										
										?> 
								  </div>
                                  </div>
                                  
                                  <div class="control-group">
									<label class="control-label" for="form-field-00">Kelas</label>
                                    <div class="controls">
										<?php 
										$kelas=$_POST['form-field-00'];
										
										echo "<input readonly type='text' name='form-field-00' id='form-field-00' value='$kelas'>";
										?>
										</div>
                                  </div>
								  
								  <div class="control-group">
									<label class="control-label" for="form-field-tahun">Tahun</label>
                                    <div class="controls">
										<?php 
										$tahun=$_POST['form-field-tahun'];
										
										$sql=mysql_query("SELECT * from tbl_tahun WHERE id='$tahun'");
										while($thn=mysql_fetch_array($sql))
											{
												echo "<input readonly type='text' value='$thn[tahun]' />";
												echo "<input readonly type='text' name='form-field-tahun' id='form-field-tahun' value='$tahun' style='display:none'  />";
											}
										
										?>
										</div>
                                  </div>
								  
								  <div class="control-group">
									<label class="control-label" for="form-field-semseter">Semester</label>
                                    <div class="controls">
										<?php 
										$semester=$_POST['form-field-semester'];
										
										echo "<input readonly type='text' name='form-field-semester' id='form-field-semester' value='$semester'>";
										?>
										</div>
                                  </div>
                                  
                                    

								 									
                                  <div class="control-group">
									<label class="control-label" for="form-field-1">Nama Siswa</label>
                                    
                                  
                                         <div class="controls">
												<?php 
												$nisn=$_POST['form-field-1'];
												$sql=mysql_query("SELECT * from tbl_siswa WHERE NISN='$nisn'");
													while($nm=mysql_fetch_array($sql))
													{
														echo "<input readonly type='text' value='$nm[nama]'>";
														echo "<input readonly type='text' name='form-field-1' id='form-field-1' value='$nisn' style='display:none'>";
													}
										
										?>
												
								</div>
                                <?php $result = mysql_query("SELECT * FROM tbl_nilai WHERE id_siswa='$nisn' AND id_mapel='$mp' AND semester='$semester' AND id_tahun='$tahun'");
								while ($rnil=mysql_fetch_array($result))
								{
								$nilai1=$rnil['ulangan1'];
								$nilai2=$rnil['ulangan2'];
								$nilai3=$rnil['ulangan3'];
								$nilai4=$rnil['ulangan4'];
									
								$remed1=$rnil['remed1'];
								$remed2=$rnil['remed2'];
								$remed3=$rnil['remed3'];
								$remed4=$rnil['remed4'];
									
								$mid=$rnil['mid'];
								$uas=$rnil['uas'];
								$tot=$rnil['tot_nilai'];
									
								}?>
                                <div class="hr"></div>
                                <div class="control-group">
								
									<label class="control-label" for="form-field-2">Ulangan 1</label>

								  <div class="controls">
										<input type="text" name="form-field-2" id="form-field-2" value="<?php 
										if(!isset($nilai1))
										{ echo "0";
										}
										else
										echo $nilai1 ?>" />
								  </div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label" for="form-field-3">Remedial 1</label>

								  <div class="controls">
										<input type="text" name="form-field-3" id="form-field-3" value="<?php
										if(!isset($remed1))
										{ echo "0";
										}
										else echo $remed1 ?>" />
								  </div>
								</div>
                                
                                 <div class="hr"></div>
                                <div class="control-group">
									<label class="control-label" for="form-field-4">Ulangan 2</label>

								  <div class="controls">
										<input type="text" name="form-field-4" id="form-field-4" value="<?php
										if(!isset($nilai2))
										{ echo "0";
										}
										else
										echo $nilai2 ?>" />
								  </div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label" for="form-field-5">Remedial 2</label>

								  <div class="controls">
										<input type="text" name="form-field-5" id="form-field-5" value="<?php
										if(!isset($remed2))
										{ echo "0";
										}
										else										echo $remed2 ?>" />
								  </div>
								</div>
                                
                                 <div class="hr"></div>
                                <div class="control-group">
									<label class="control-label" for="form-field-6">Ulangan 3</label>

								  <div class="controls">
										<input type="text" name="form-field-6" id="form-field-6" value="<?php 
										if(!isset($nilai3))
										{ echo "0";
										}
										else echo $nilai3 ?>" />
								  </div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label" for="form-field-7">Remedial 3</label>

								  <div class="controls">
										<input type="text" name="form-field-7" id="form-field-7" value="<?php
										if(!isset($remed3))
										{ echo "0";
										}
										else echo $remed3 ?>" />
								  </div>
								</div>
                                
                                 <div class="hr"></div>
                                <div class="control-group">
									<label class="control-label" for="form-field-8">Ulangan 4</label>

								  <div class="controls">
										<input type="text" name="form-field-8" id="form-field-8" value="<?php 
										if(!isset($nilai4))
										{ echo "0";
										}
										else
											echo $nilai4 ?>" />
								  </div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label" for="form-field-9">Remedial 4</label>

								  <div class="controls">
										<input type="text" name="form-field-9" id="form-field-9" value="<?php 
										if(!isset($remed4))
										{ echo "0";
										}
										else
											echo $remed4 ?>" />
								  </div>
								</div>
                                
                                 <div class="hr"></div>
                                <div class="control-group">
									<label class="control-label" for="form-field-10">Ulangan Tengah Semester</label>

								  <div class="controls">
										<input type="text" name="form-field-10" id="form-field-10" value="<?php 
										if(!isset($mid))
										{ echo "0";
										}
										else
											echo $mid ?>"/>
								  </div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label" for="form-field-11">Ujian Semester</label>

								  <div class="controls">
										<input type="text" name="form-field-11" id="form-field-11" value="<?php 
										if(!isset($uas))
										{ echo "0";
										}
										else echo $uas ?>" />
								  </div>
								</div>
								
								 <div class="control-group">
									<label class="control-label" for="form-field-11">Nilai Akhir</label>

								  <div class="controls">
										<input type="text" readonly n value="<?php
										if(!isset($tot))
										{ echo "0";
										}
										else
											echo $tot ?>" />
								  </div>
								</div>
                             
                                
                                
                              																		
								</div>
                                <div class="control-group">
								  <div class="controls"></div>
								</div>
                                
                                							                                
                                                                         
								<div class="control-group">
								  <div class="controls"></div>
								</div>

								<div class="form-actions">
									<button type="submit" class="btn btn-info" type="button">
										<i class="icon-ok bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="icon-undo bigger-110"></i>
										Reset
									</button>
								</div>
							<!--PAGE CONTENT ENDS-->
					   </div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
	</body>
</html>
