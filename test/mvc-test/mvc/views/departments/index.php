<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/header.php';?>
<script type="text/javascript" src="/test/mvc-test/mvc/views/departments/script.js"></script>
<section class="mainBody" style="height: 500px; width: 500px; margin: 0 auto;">
	<h2>Departments Information</h2>
	<row>
		<div class="col-8 ">
		</div>
		<div class="col-4 text-right">
			<!-- Кнопка запуска модального окна -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"  data-target="#new_section_modal">
			  Create A Department
			</button>
	  </div>
	</row>
	<!-- Модальное окно -->
	<div class="modal fade" id="new_section_modal" tabindex="-1" role="dialog" aria-labelledby="new_section_modal_title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title align-baseline" id="new_section_modal_title">Append A Department</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

				<div class="modal-body">
					<form id="form_new_section" method="POST" action="/test/mvc-test/mvc/departments/addDepartment/">
					  <div class="mb-3">
					    <label for="name" class="form-label">Department Name</label>
					    <input type="text" name="name" required="required" class="form-control" id="name" aria-describedby="name">
					  </div>
					</form>
	      </div>

				<div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="add_new_section" onclick="add_new_section()">Add</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Модальное edit окно -->
	<div class="modal fade" id="edit_section_modal" tabindex="-1" role="dialog" aria-labelledby="edit_section_modal_title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title align-baseline" id="edit_section_modal_title">Append A Department</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					<form id="form_department_section" method="POST" action="/test/mvc-test/mvc/departments/edit/">
						<input type="hidden" name="id" value="">
						<div>
							<span class="edit_id"></span>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Department Name</label>
							<input type="text" name="name" required="required" class="form-control" id="name">
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="edit_section()">Edit</button>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id Department</th>
	      <th scope="col">Name Department</th>
				<th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
			<?php if ( !empty($this->sections_list) ) {
			foreach ($this->sections_list as $value):?>
			<tr>
				<th scope="col"><?=$value['id']?></th>
				<td><?=$value['name']?></td>
				<td class="text-right">
					<button type="button" class="btn btn-outline-primary btn-sm" onclick="section_edit(<?=$value['id']?>)">Edit</button>
					<button type="button" class="btn btn-outline-danger btn-sm" onclick="dep_del(<?=$value['id']?>)">Delete</button>
				</td>
			</tr>
		<?php endforeach; }?>
	  </tbody>
	</table>
</section>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/footer.php';?>
