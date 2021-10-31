<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/header.php';?>
<script type="text/javascript" src="/test/mvc-test/mvc/views/Employees/script.js"></script>
<section class="mainBody" style="height: 500px; margin: 0 auto;">
	<h2>Employees Information</h2>
	<row>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Id Project</th>
	      <th scope="col">Name Project</th>
				<th scope="col">Sum(salary)</th>
	    </tr>
	  </thead>
	  <tbody>
			<?php foreach ($this->report_list as $value):?>
      <tr>
        <th scope="col"><?=$value['project_id']?></th>
        <td><?=$value['name']?></td>
        <td><?=$value['SUM(salary)']?></td>
      </tr>
      <?php endforeach;?>
	  </tbody>
	</table>
</section>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/test/mvc-test/mvc/views/footer.php';?>
