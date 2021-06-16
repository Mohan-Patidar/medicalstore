<div class="footer-wrapper mt-5">
	<div class="footer-section f-section-1">
		<p class="">Copyright © <?php echo date("Y"); ?> <a target="_blank" href="./"><?php echo $row_user->name; ?></a>, All rights reserved.</p>
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
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>  -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="assets/js/custom_script.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script> -->
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
<?php
if (isset($_COOKIE['msg']) && $_COOKIE['msg'] == 5) {
?>
	<script>
		swal({
			title: 'Database',
			text: "Imported Successfully!",
			icon: 'success',
			button: 'Ok'
		});


		



	</script>
<?php }
?>








<script>
	$( function() {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.attr( "title", "" )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					})
					.tooltip({
						classes: {
							"ui-tooltip": "ui-state-highlight"
						}
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.tooltip()
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.on( "mousedown", function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.on( "click", function() {
						input.trigger( "focus" );

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didn't match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});

		$( "#combobox" ).combobox();
		$( "#toggle" ).on( "click", function() {
			$( "#combobox" ).toggle();
		});
	} );
	</script>

<script>
        $(document).ready(function(){
    
      $(".custom-combobox-toggle").removeAttr("title");
 
  });
    </script>
	<script>
    $(function() {

$("#newModalForm").validate({
  rules: {
    name: {
      required: true,
      
    },
    address: {
      required: true,
      
    },
    phone: {
      required: true,
      minlength: 10
    },
    action: "required"
  },
  messages: {
    name: {
      required: "Name is required",
     
    },
    address: {
      required: "Address is required",
   
    },
    phone: {
      required: "Contact number is required",
      minlength: "Your data must be at least 10 characters"
    },
   
  }
  
});

});
</script>
<script>
$(function(){
    $("#send").on('click',function (e) {
    e.preventDefault();
    $new =$('#price').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $detail =$('#detail').val();
    $date = $('#date').val();
    $.ajax({
      type: "POST", 
      url: "customeraddprice.php",
      data: {'price':$new,
            'old_price':$old,
                'id':$id,
             'detail':$detail,
             'date':$date},
      success:function(data){
        location.reload();
 
      }
    });
	});
	$("#sub").on('click',function (e) {
    e.preventDefault();
    $new =$('#sprice').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $sdetail =$('#sdetail').val();
    $date = $('#sdate').val();
    $.ajax({
      type: "POST", 
      url: "customersubprice.php",
      data: {'sprice':$new,
            'old_price':$old,
                'id':$id,
             'sdetail':$sdetail,
             'sdate':$date},
      success:function(){
        location.reload();
      }
    });
    });
    })


     $('.add').keyup(function(){
      $('.pop').css('display','block');
    });

	$('.close').click(function(){
        window.location.reload();
    });

</script>
</body>

</html>