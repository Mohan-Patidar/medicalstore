<div class="footer-wrapper mt-5">
	<div class="footer-section f-section-1">
		<p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
	</div>
	<div class="footer-section f-section-2">
		<p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
				<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
			</svg></p>
	</div>
</div>

</div>
</div>
<!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script>
	$(document).ready(function() {
		App.init();
	});
</script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/apps/invoice.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script type="text/javascript" src="assets/js/jquery.validate.js"></script>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="plugins/table/datatable/datatables.js"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="plugins/table/datatable/button-ext/jszip.min.js"></script>
<script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
<script>
	$('#html5-extension').DataTable({
		dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
		buttons: {
			buttons: [{
					extend: 'copy',
					className: 'btn'
				},
				{
					extend: 'csv',
					className: 'btn'
				},
				{
					extend: 'excel',
					className: 'btn'
				},
				{
					extend: 'print',
					className: 'btn'
				}
			]
		},
		"oLanguage": {
			"oPaginate": {
				"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
				"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
			},
			"sInfo": "Showing page _PAGE_ of _PAGES_",
			"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
			"sSearchPlaceholder": "Search...",
			"sLengthMenu": "Results :  _MENU_",
		},
		"stripeClasses": [],
		"lengthMenu": [7, 10, 20, 50],
		"pageLength": 7
	});
</script>

<script>
	$("#password-form").validate({
		errorElement: 'div',
		errorClass: 'help-inline',
		rules: {
			old_password: {
				required: true
			},
			new_password: {
				required: true,
			},
			confirm_password: {
				required: true,
				equalTo: '#new_password'
			}
		},
		messages: {
			old_password: {
				required: "Old Password Is Required"
			},
			new_password: {
				required: "New Password Is Required",
			},
			confirm_password: {
				required: "Confirm Password Is Required",
				equalTo: 'Password Do Not Match'
			}
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
</script>
<script>
	$("#medicine-form").validate({
		errorElement: 'div',
		errorClass: 'help-inline',
		rules: {
			medicine_name: {
				required: true
			},
			batch_no: {
				required: true
			},
			quantity: {
				required: true
			},
			notification_quantity: {
				required: true
			},
			medicine_type: {
				required: true
			},
			mrp: {
				required: true
			},
			price: {
				required: true
			},
			month: {
				required: true
			},
			year: {
				required: true
			}
		},
		messages: {
			medicine_name: {
				required: "Medicine Name Is Required"
			},
			batch_no: {
				required: "Batch No. Is Required"
			},
			quantity: {
				required: "Quantity Is Required"
			},
			notification_quantity: {
				required: "Notification Quantity Is Required"
			},
			medicine_type: {
				required: "Medicine Type Is Required"
			},
			mrp: {
				required: "MRP Is Required"
			},
			price: {
				required: "Price Is Required"
			},
			month: {
				required: "Expiry Month Is Required"
			},
			year: {
				required: "Expiry Month & Year Is Required"
			}
		},
		submitHandler: function(form) {
			//form.submit();
		}
	});
</script>
<script>
	$(document).ready(function() {
		$("input[type=radio]").click(function() {
			var type = $(this).val();
			if (type == 'Other') {
				$("#other-description").show();
				$("#other_type_description").prop('required', true);
			} else {
				$("#other-description").hide();
				$("#other_type_description").prop('required', false);
			}
		});
	});
</script>
<script type="text/javascript">
	$('#medicine-form').submit(function(e) {
		var form = $(this);
		e.preventDefault();
		var formData = new FormData(this);
		if (!$('#medicine-form').valid()) return;
		$.ajax({
			type: "POST",
			url: "query-db",
			data: formData, // <--- THIS IS THE CHANGE
			dataType: "html",
			success: function(data) {
				if (data == 'success') {
					swal({
						title: "Medicine",
						text: "Medicine Add Successfully!",
						icon: "success",
						button: "Ok",
					}).then(function() {
						$('#medicine-form')[0].reset();
					});
				}
				if (data == 'updated') {
					swal({
						title: 'Medicine Data',
						text: "Updated Successfully!",
						icon: 'success',
						button: 'Ok'
					});
				}
				if (data == 'error') {
					swal("Sorry!", "Your request failed!", "error");
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
	});
</script>
<script type="text/javascript">
	function deleteData(id, table) {
		swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this data!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: "delete-db",
						data: {
							"id": id,
							"table": table
						}, // <--- THIS IS THE CHANGE
						success: function(data) {
							swal("Success! Your data has been deleted!", {
								icon: "success",
							}).then(function() {
								window.location.reload();
							});
						},
					});

				} else {
					swal("Your data is safe!");
				}
			});

	}
</script>
<script>
	$(document).ready(function() {
		$("#filter-form").on("change", "input:radio", function() {
			$("#filter-form").submit();
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(".addCF").click(function() {
			$("#customFields").append('<tr> <td></td><td> <input type="text" list="browsers" class="form-control medicine_name" name="medicine_name[]" value="" placeholder="Medicine Name" autocomplete="off"/><datalist id="browsers1" class="browsers"></datalist> </td><td> <input type="number" class="form-control" id="qty" name="qty[]" value="" placeholder="Quantity" autocomplete="off"/> </td><td> <input type="number" class="form-control" id="qty" name="mrp[]" value="" placeholder="Unit Price"/> </td><td> <input type="number" class="form-control" id="total" name="total[]" value="" placeholder="Total"/> </td><td> <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus-circle"></i></a> </td></tr>');
		});
		$("#customFields").on('click', '.remCF', function() {
			$(this).parent().parent().remove();
		});
	});
</script>
<script>
	$("#customFields").on("click", ".medicine_name", function() {
		var keywords = $(this).val();
		$.ajax({
			method: "POST",
			url: "search-medicine",
			data: {
				keywords: keywords
			},
			success: function(datas) {
				var data = JSON.parse(datas);
				var list = "";
				for (var i = 0; i < data.length; i++) {
					list += '<option value="' + data[i] + '">';
				}
				$(".browsers").html(list);
			}
		});
	});
</script>

</body>

</html>