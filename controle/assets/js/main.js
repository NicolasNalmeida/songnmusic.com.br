$('.add-insert').on('click', function(){
	swal({
		title: "Deseja adicionar um fornecedor?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#03a061",
		confirmButtonText: "Sim, adicione!",
		closeOnConfirm: true
	},
	function(){
		$('#inserirTarget').submit();
	});
});

$('.add-delete').on('click', function(){
	swal({
		title: "Deseja desativar um fornecedor?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#03a061",
		confirmButtonText: "Sim, desative!",
		closeOnConfirm: true
	},
	function(){
		$('#deleteTarget').submit();
	});
});

$('.add-atualizar').on('click', function(){
	swal({
		title: "Deseja atualizar este fornecedor?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#03a061",
		confirmButtonText: "Sim, atualize!",
		closeOnConfirm: true
	},
	function(){
		$('#updateTarget').submit();
	});
});