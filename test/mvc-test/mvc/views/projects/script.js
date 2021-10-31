function add_new_project() {
  form = $('#form_project_section');

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
    alert('Проект добавлен');
    setTimeout('', 2000);
    location.reload();
	}
}
function section_edit(id) {
  $.ajax({
    url: "/test/mvc-test/mvc/projects/get_by_id/"+id+"/",
    dataType: "json",
    type: "POST",
    success: function(json) {
      console.log(json);
      if (json.success) {
console.log(json.section);
        jQuery.noConflict();
        modal = $('#edit_section_modal');
        modal.find("input[name='id']").val(json.section[0].id);
        modal.find("input[name='name']").val(json.section[0].name);
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
     alert('Проект изменен');
     setTimeout('', 2000);
     location.reload();
   }
}

function pr_del(id) {
  $.ajax({
    url: "/test/mvc-test/mvc/projects/delProject/"+id+"/",
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
