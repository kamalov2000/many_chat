<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/header.php';?>
<script type="text/javascript" src="/test/mvc-test/mvc/views/projects/script.js"></script>
<section class="mainBody" style="height: 500px; width: 500px; margin: 0 auto;">
	<h2>Project Information</h2>
	<row>
		<div class="col-8 ">
		</div>
		<div class="col-4 text-right">
			<!-- Кнопка запуска модального окна -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new_project_modal">
				Create Project
			</button>
		</div>
	</row>

	<!-- Модальное окно -->
	<div class="modal fade" id="new_project_modal" tabindex="-1" role="dialog" aria-labelledby="new_project_modal_title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title align-baseline" id="new_project_modal_title">Append A Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form_project_section" method="POST" action="/test/mvc-test/mvc/projects/addProject/">
						<div class="mb-3">
							<label for="name" class="form-label">Project Name</label>
							<input type="text" name="name" required="required" class="form-control" id="name">
						</div>

						<div class="mb-3">
							<label for="name_employeer" class="form-label">Employeer Name</label>
							<select class="form-control" aria-describedby="name_employeer" name="name_employeer" id="name_employeer">
								<option value=""></option>
								<?php foreach ($this->employeer_list as $value):?>
									<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="add_new_project" onclick="add_new_project()">Add</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Модальное edit окно -->
	<div class="modal fade" id="edit_section_modal" tabindex="-1" role="dialog" aria-labelledby="edit_section_modal_title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title align-baseline" id="edit_section_modal_title">Append A Project</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					<form id="form_project_section" method="POST" action="/test/mvc-test/mvc/projects/edit/">
						<input type="hidden" name="id" value="">
						<div>
							<span class="edit_id"></span>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Project Name</label>
							<input type="text" name="name" required="required" class="form-control" id="name">
						</div>

						<div class="mb-3">
							<label for="name_employeer" class="form-label">Employeer Name</label>
							<select class="form-control" aria-describedby="employee_id" name="employee_id" id="employee_id">
								<option value=""></option>
								<?php foreach ($this->employeer_list as $value):?>
									<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="add_new_project" onclick="edit_section()">Edit</button>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Id Project</th>

				<th scope="col">Name Project</th>

				<th scope="col">Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php if ( !empty($this->projects_list) ) {
			foreach ($this->projects_list as $value):?>
				<tr>
					<th scope="col"><?=$value['id']?></th>
					<td><?=$value['name']?></td>
					<td class="text-right">
						<button type="button" class="btn btn-outline-primary btn-sm" onclick="section_edit(<?=$value['id']?>)">Edit</button>
						<button type="button" class="btn btn-outline-danger btn-sm" onclick="pr_del(<?=$value['id']?>)">Delete</button>
					</td>
				</tr>
			<?php endforeach; }?>
		</tbody>
	</table>
</section>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/footer.php';?>
