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
//Medicine form validation
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

//Add Medicine
$("#add-medicine").validate({
    errorElement: 'div',
    errorClass: 'help-inline',
    rules: {
        medicine_name: {
            required: true
        },
        quantity: {
            required: true
        }
    },
    messages: {
        medicine_name: {
            required: "Medicine Name Is Required"
        },
        quantity: {
            required: "Quantity Is Required"
        }
    },
    submitHandler: function(form) {
        //form.submit();
    }
});

//Update Medicine Stock
$("#update-stock-form").validate({
    errorElement: 'div',
    errorClass: 'help-inline',
    rules: {
        quantity: {
            required: true
        },
        mrp: {
            required: true
        },
        price: {
            required: true
        }
    },
    messages: {
        quantity: {
            required: "Quantity Is Required"
        },
        mrp: {
            required: "MRP Is Required"
        },
        price: {
            required: "Price Is Required"
        }
    },
    submitHandler: function(form) {
        //form.submit();
    }
});
//Active Other Medicine type description box
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
    //Active Menu Bar
    var active = $("#content").data("value");
    if (active == 'dashboard') {
        $(".dashboard").addClass("active");
    }
    if (active == 'invoice-list') {
        $(".billing").addClass("active");
        $(".invoice-list").addClass("active");
    }
    if (active == 'new-invoice') {
        $(".billing").addClass("active");
        $(".new-invoice").addClass("active");
    }
    if (active == 'stock-review') {
        $(".stock-review").addClass("active");
    }
    if (active == 'add-medicine') {
        $(".medicine").addClass("active");
        $(".add-medicine").addClass("active");
    }
    if (active == 'manage-medicine') {
        $(".medicine").addClass("active");
        $(".manage-medicine").addClass("active");
    }
    if (active == 'update-stock') {
        $(".update-stock").addClass("active");
    }
    if (active == 'settings') {
        $(".settings").addClass("active");
    }

});

$(document).ready(function() {
    //add & update medicine
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
                        text: "Medicine Added Successfully!",
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

   //add & update medicine
   $('#update-invoice').submit(function(e) {

    
    $('#c_name').val($('#customer_name').val());
    $('#c_addr').val($('#customer_address').val());
    var form = $(this);
    e.preventDefault();
    var formData = new FormData(this);
    if (!$('#update-invoice').valid()) return;
    $.ajax({
        type: "POST",
        url: "query-db",
        data: formData, // <--- THIS IS THE CHANGE
        dataType: "html",
        success: function(data) {
            if (data == 'success') {
                swal({
                    title: "Invoice",
                    text: "Invoice Added Successfully!",
                    icon: "success",
                    button: "Ok",
                }).then(function() {
                    $('#update-invoice')[0].reset();
                });
            }
            if (data == 'updated') {
                swal({
                    title: 'Invoice Data',
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


    //Update medicine stock
    $('#update-stock-form').submit(function(e) {
        var form = $(this);
        e.preventDefault();
        var formData = new FormData(this);
        if (!$('#update-stock-form').valid()) return;
        $.ajax({
            type: "POST",
            url: "query-db",
            data: formData, // <--- THIS IS THE CHANGE
            dataType: "html",
            success: function(data) {
                if (data == 'updated') {
                    swal({
                        title: 'Medicine Stock',
                        text: "Updated Successfully!",
                        icon: 'success',
                        button: 'Ok'
                    }).then(function() {
                        window.location.reload();
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
    //Restore Database
    $("#restore").click(function() {
        $("#db_file").click();
    });

});

//Submit Restore
function submitRestore() {
    $("form#restore-form").submit();
}
//Update Stock
function updateStock(id, medicine, mrp, price) {
    $("#update_stock").modal('show');
    $("#mid").val(id);
    $("#medicine_name").val(medicine);
    $("#mrp").val(mrp);
    $("#price").val(price);
    $("#table").val("medicine");
}
//Update Stock
function updateStatus(id, table, status) {
    var set_status = 'Active';
    if (status == 'Active') {
        set_status = 'Inactive';
    }
    $.ajax({
        method: "POST",
        url: "query-db",
        data: {
            id: id,
            status: set_status,
            table: table,
            status_update: "success"
        },
        success: function(datas) {
            window.location.reload();
        }
    });
}
//Delete Medicine
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

$(document).ready(function() {
    $("#filter-form").on("change", "input:radio", function() {
        $("#filter-form").submit();
    });
});

$(document).ready(function() {
    $("#6-medicine").on("click", ".medicine_name", function() {
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
                //  $(".browsers").show();;
            }
        });
        
    });
    //Add medicine on table

    var medicineId = [  ];
    var medicineName = [];
    var medicineQty = [];
    var medicineMrp = [];
    var medicineAmount = [];
    $('#add-medicine').submit(function(e) {
        var form = $(this);
        e.preventDefault();
        var formData = new FormData(this);
        if (!$('#add-medicine').valid()) return;
        $("#c_name").val($("#customer_name").val());
        $("#c_email").val();
        $("#c_mobile").val();
        $("#c_address").val($("#customer_address").val());
        $.ajax({
            type: "POST",
            url: "add-customer-medicine",
            data: formData, // <--- THIS IS THE CHANGE
            dataType: "html",
            success: function(datas) {
                var data = JSON.parse(datas);
                if (data.response == 'success') {

                    if (jQuery.inArray(data.id, medicineId) === -1) {
                        medicineId.push(data.id);
                        medicineName.push(data.medicine_name);
                        medicineQty.push(data.quantity);
                        medicineMrp.push(data.mrp);
                        medicineAmount.push(data.amount);
                        $("#medicine_id").val(medicineId);
                        $("#customer_medicine_name").val(medicineName);
                        $("#customer_medicine_quantity").val(medicineQty);
                        $("#customer_medicine_mrp").val(medicineMrp);
                        $("#customer_total_amount").val(medicineAmount);
                        var sub_total = 0;
                        for (var i = 0; i < medicineAmount.length; i++) {
                            sub_total += medicineAmount[i];
                        }
                        $("#sub_total").val(sub_total);
                        $(".sub_total").text(sub_total);
                        $("#grand_total").val(sub_total);
                        $(".grand_total").text(sub_total);
                        if (sub_total > 0) {
                            $("#display-total").show();
                        } else {
                            $("#display-total").hide();
                        }

                        $("#customFields").append('<tr> <td></td><td> ' + data.medicine_name + '</td><td>' + data.quantity + '</td><td> ' + data.mrp + '</td><td> ' + data.amount + '</td><td> <a href="javascript:void(0);" class="remCF"><i class="fa fa-minus-circle"></i></a> </td></tr>');
                        $('#add-medicine')[0].reset();
                    } else {
                        swal({
                            title: 'Sorry!',
                            text: "Medicine already added!",
                            icon: 'warning',
                            button: 'Ok'
                        });
                    }
                }
                if (data.response == 'error') {
                    swal({
                        title: 'Sorry!',
                        text: data.message,
                        icon: 'warning',
                        button: 'Ok'
                    });
                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $("#customFields").on('click', '.remCF', function() {
        var row_index = $(this).parent().parent().index();

        medicineId.splice(row_index, 1);
        medicineName.splice(row_index, 1);
        medicineQty.splice(row_index, 1);
        medicineMrp.splice(row_index, 1);
        medicineAmount.splice(row_index, 1);
        $(this).parent().parent().remove();
        $("#medicine_id").val(medicineId);
        $("#customer_medicine_name").val(medicineName);
        $("#customer_medicine_quantity").val(medicineQty);
        $("#customer_medicine_mrp").val(medicineMrp);
        $("#customer_total_amount").val(medicineAmount);
        var sub_total = 0;
        for (var i = 0; i < medicineAmount.length; i++) {
            sub_total += medicineAmount[i];
        }
        $("#sub_total").val(sub_total);
        $(".sub_total").text(sub_total);
        $("#grand_total").val(sub_total);
        $(".grand_total").text(sub_total);
        if (sub_total > 0) {
            $("#display-total").show();
        } else {
            $("#display-total").hide();
        }
    });
    $("#discount").keyup(function() {
        var discount = $("#discount").val();
        var sub_total = $("#sub_total").val();
        var grand_total = sub_total - discount;
        $("#grand_total").val(grand_total);
        $(".grand_total").text(grand_total);
    });

    //Submit Invoice Data
    $('#selected-medicine-form').submit(function(e) {
        var form = $(this);
        e.preventDefault();
        var formData = new FormData(this);
        if (!$('#selected-medicine-form').valid()) return;
        $.ajax({
            type: "POST",
            url: "add-invoice-db",
            data: formData, // <--- THIS IS THE CHANGE
            dataType: "html",
            success: function(data) {
                if (data == 'success') {
                    swal({
                        title: "Success",
                        text: "Invoice Add Successfully!",
                        icon: "success",
                        button: "Ok",
                    }).then(function() {
                        window.location.reload();
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
    //Set Notification
    $("#set-notification").click(function() {
        var status = $("#set-notification").val();
        var set_status = 'Active';
        if (status == 'Active') {
            set_status = 'Inactive';
        }
        $.ajax({
            method: "POST",
            url: "query-db",
            data: {
                notification_status: set_status,
                table: "admin_login",
                status_update: "success"
            },
            success: function(datas) {
                window.location.reload();
            }
        });
    });
});
//Delete Invoice
function deleteInvoice(iid, table) {
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
                        "id": iid,
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
$(document).ready(function(){
    $(".custom-combobox").hover(function(){
      $(".custom-combobox-toggle").removeAttr("title");
    });
  });