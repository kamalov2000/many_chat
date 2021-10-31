function add_new_user() {
  form = $('#form_new_user');

	if (form[0].checkValidity() === false) {
		form.addClass('was-validated');
	} else {
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			dataType: "json",
			data: form.serialize(),
			success: function(json) {
        console.log(json);
      }

		})
    alert('Пользователь добавлен');
    setTimeout('', 2000);
    location.reload();
	}
}
function user_del(id) {
  $.ajax({
    url: "/test/mvc-test/mvc/employees/delUser/"+id+"/",
    dataType: "json",
    type: "POST",
    success: function (json) {
      if (json.success) {
        $('#table_section_list tr[data-id="'+id+'"]').remove();
      }
    }
  })
  location.reload();
}

function get_section_list(el_id) {
  $.ajax({
    url: "/test/mvc-test/mvc/employees/createEmployee/",
    type: "POST",
    dataType: 'html',
    success: function (html) {
      $(el_id).empty();
      $(el_id).append(html);
    }
  })
}

function section_edit(id) {
  $.ajax({
    url: "/test/mvc-test/mvc/employees/get_by_id/"+id+"/",
    dataType: "json",
    type: "POST",
    success: function(json) {
      console.log(json);
      if (json.success) {
        jQuery.noConflict();
        modal = $('#edit_section_modal');
        modal.find("input[name='id']").val(json.section[0].id);
        modal.find("input[name='name']").val(json.section[0].name);
        modal.find("input[name='first_name']").val(json.section[0].first_name);
        modal.find("input[name='second_name']").val(json.section[0].second_name);
        modal.find("input[name='male']").val(json.section[0].male);
        modal.find("input[name='date_birth']").val(json.section[0].date_birth);
        modal.find("input[name='salary']").val(json.section[0].salary);
        modal.find("select[name='id_department']").val(json.section[0].id_department);
        modal.find("select[name='project_id']").val(json.section[0].project_id);
        modal.find("input[name='employee_id']").val(json.section[0].employee_id);
        modal.modal('toggle');
      }
    }
  })
}
function edit_section() {
  modal = $('#edit_section_modal');
  form = modal.find('form');
  if (form[0].checkValidity() === false) {
		form.addClass('was-validated');
	} else {
     $.ajax({
       url: form.attr('action'),
       type: form.attr('method'),
       dataType: "json",
       data: form.serialize(),
       success: function(json) {
         console.log(json);
       }
     })
     alert('Пользователь изменен');
     setTimeout('', 2000);
     location.reload();
   }
}
