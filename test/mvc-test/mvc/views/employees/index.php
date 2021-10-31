<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/header.php';?>
<script type="text/javascript" src="/test/mvc-test/mvc/views/employees/script.js"></script>
<h2>Employees Information</h2>
<row>

  <div class="col-8 ">
  </div>
  <div class="col-4">
    <!-- Кнопка запуска модального окна -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"  data-target="#new_section_modal">
      Create An Employee
    </button>
  </div>
</row>
<!-- Модальное окно -->

<div class="modal fade" id="new_section_modal" tabindex="-1" role="dialog" aria-labelledby="new_section_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title align-baseline" id="new_section_modal_title">Append Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="form_new_user" method="POST" action="/test/mvc-test/mvc/employees/createEmployee/">
          <div class="mb-3">
            <label for="name" class="form-label">Name Employee</label>
            <input type="text" name="name" required="required" class="form-control" id="name" aria-describedby="name">
          </div>

          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" required="required" class="form-control" id="first_name" aria-describedby="first_name">
          </div>

          <div class="mb-3">
            <label for="second_name" class="form-label">Second Name</label>
            <input type="text" name="second_name" required="required" class="form-control" id="second_name" aria-describedby="second_name">
          </div>

          <div class="mb-3">
            <label for="male" class="form-label">Sex</label>
            <select class="form-control" aria-describedby="male" name="male" id="male">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="date_birth" class="form-label">Date Birth</label>
            <input type="date" name="date_birth" required="required" class="form-control" id="date_birth" aria-describedby="date_birth">
          </div>

          <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" name="salary" required="required" class="form-control" id="salary" aria-describedby="salary">
          </div>

          <div class="mb-3">
            <label for="id_department" class="form-label">Name Department</label>
              <select class="form-control" aria-describedby="id_department" name="id_department" id="id_department">
                <?php foreach ($this->dep_list as $value):?>
                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
              <?php endforeach;?>
              </select>
          </div>

          <div class="mb-3">
            <label for="project_id" class="form-label">Name Project</label>
              <select class="form-control" aria-describedby="project_id" name="project_id" id="project_id">
              <?php foreach ($this->pr_list as $value):?>
                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
              <?php endforeach;?>
              </select>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_new_user" onclick="add_new_user()">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- Модальное edit окно -->
<div class="modal fade" id="edit_section_modal" tabindex="-1" role="dialog" aria-labelledby="edit_section_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title align-baseline" id="edit_section_modal_title">Edit Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="form_new_user" method="POST" action="/test/mvc-test/mvc/employees/edit/">
					<input type="hidden" name="id" value="">
					<div>
						<span class="edit_id"></span>
					</div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" required="required" class="form-control" id="name" aria-describedby="name">
          </div>

          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" required="required" class="form-control" id="first_name" aria-describedby="first_name">
          </div>

          <div class="mb-3">
            <label for="second_name" class="form-label">Second Name</label>
            <input type="text" name="second_name" required="required" class="form-control" id="second_name" aria-describedby="second_name">
          </div>

          <div class="mb-3">
            <label for="male" class="form-label">Sex</label>
            <select class="form-control" aria-describedby="male" name="male" id="male">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="date_birth" class="form-label">Date Birth</label>
            <input type="date" name="date_birth" required="required" class="form-control" id="date_birth" aria-describedby="date_birth">
          </div>

          <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" name="salary" required="required" class="form-control" id="salary" aria-describedby="salary">
          </div>

          <div class="mb-3">
            <label for="id_department" class="form-label">Department </label>
						<select class="form-control" aria-describedby="id_department" name="id_department" id="id_department">
							<?php foreach ($this->dep_list as $value):?>
							<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
						<?php endforeach;?>
						</select>
          </div>

					<div class="mb-3">
            <label for="project_id" class="form-label">Project Name</label>
              <select selected="selected" class="form-control" aria-describedby="project_id" name="project_id" id="project_id">
							<?php foreach ($this->pr_list as $value):?>
                <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
              <?php endforeach;?>
              </select>
          </div>

          <div class="mb-3" hidden="hidden">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" name="employee_id" class="form-control" id="employee_id" aria-describedby="employee_id">
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add_new_user" onclick="edit_section()">Save</button>
      </div>
    </div>
  </div>
</div>

<table class="table" id="table_section_list">
  <thead>
    <tr>
      <th scope="col">Id Employeer</th>
      <th scope="col">Name Employeer</th>
      <th scope="col">First Name</th>
      <th scope="col">Second Name</th>
      <th scope="col">Male</th>
      <th scope="col">Date Birth</th>
      <th scope="col">Salary</th>
      <th scope="col">ID Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
		if ( !empty($this->user_list) ) {
		foreach ($this->user_list as $value):?>
    <tr data-id="<?=$value['id']?>">
      <th scope="col"><?=$value['id']?></th>
      <td><?=$value['name']?></td>
      <td><?=$value['first_name']?></td>
      <td><?=$value['second_name']?></td>
      <td><?=$value['male']?></td>
      <td><?=$value['date_birth']?></td>
      <td><?=$value['salary']?></td>
      <td><?=$value['id_department']?></td>
      <td class="text-right">
        <button type="button" class="btn btn-outline-primary btn-sm" onclick="section_edit(<?=$value['id']?>)">Edit</button>
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="user_del(<?=$value['id']?>)">Delete</button>
      </td>
    </tr>
	<?php endforeach; }?>
  </tbody>
</table>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/footer.php';?>
