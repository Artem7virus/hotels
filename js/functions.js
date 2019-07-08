// Сделать передачу данных для существующих в ajax contoller
// Сделать в темлейте обработку пустых данных для новой записи - БЛЯ НЕ ЗАБЫТЬ
// Сделать проверку вводимых параметров на JS
// Сделать проверку на инклюды на стороне ПЫХА
// Придумать общие правила для модулей. Описать их в мануале (чтоб самому - не забыть)

jQuery(document).ready(function(){
    $("#addBistro").click(function() {
        $.ajax({
            method: "POST",
            url: "/index.php",
            data: "action=showEditBistroForm",
            dataType: "html",
            success: function(html) {
                $( "#editFormContent" ).append(html);
                $("#editForm").show("slow");
            }
        });
    });
  
    $(".editBistro").click(function() {
        $.ajax({
            method: "POST",
            url: "/index.php",
            data: "action=showEditBistroForm&id="+$(this).attr('attr'),
            dataType: "html",
            success: function(html) {
                $("#editFormContent").append(html);
                $("#editForm").show("slow");
            }
        });
    });
    
    $(".delBistro").click(function() {
		if(confirm("Вы действительно хотите удалить запись №"+$(this).attr('attr')+"?")){
			$.ajax({
				method: "POST",
				url: "/index.php",
				data: "action=delBistro&id="+$(this).attr('attr'),
				dataType: "html",
				success: function(html) {
					$("#bistroList").html(html);
				}
			});
        }else{
            return;
        }
    });
    
    $('#editFormContent').on('click', '#cancelButton',  function () {
        if(confirm("Вы действительно хотите закрыть форму? Все введенные данные будут утрачены.")){
            $("#AJAXform").remove();
            $("#editForm").hide("slow");
        }else{
            return;
        }
    });
    
    $('#editFormContent').on('click', '#okAddButton',  function () {
		if(confirm("Новый пункт питания будет сохранен и появится в списке. Позднее вы сможете отредактировать информацию.")){
            $.ajax({
				method: "POST",
				url: "/index.php",
				data: "action=addBistro&type="+$('#type').val()+
                        "&name="+$('#name').val()+
                        "&address="+$('#address').val()+
                        "&services="+$('#services').val()+
                        "&price="+$('#price').val()+
                        "&phone="+$('#phone').val(),
				dataType: "html",
				success: function(html) {
					$("#bistroList").html(html);
				}
			});
			$("#AJAXform").remove();
			$("#editForm").hide("slow");
		}else{
			return;
		}
	});

    $('#editFormContent').on('click', '#okEditButton',  function () {
		if(confirm("Изменения будут сохранены.")){
			$("#AJAXform").remove();
			$("#editForm").hide("slow");
		}else{
			return;
		}
	});
});
