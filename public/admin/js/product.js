// $(document).ready(function () {
//     var table = $('#ptable').DataTable();
//     table.destroy();
//     $('#ptable').DataTable({
//         ajax: {
//             url: "/api/product",
//             dataSrc: ""
//         },
//         dom: 'Bfrtip',
//         buttons: [
//             'pdf',
//             'excel',
//             {
//                 text: 'Add stock',
//                 className: 'btn btn-primary',
//                 action: function (e, dt, node, config) {
//                     $("#sform").trigger("reset");
//                     $('#productModal').modal('show');
//                     $('#productUpdate').hide();
//                 }
//             }
//         ],
//         columns: [
//             { data: 'product_id' },

//             { data: 'product_name' },

//             { data: 'brand_id' },

//             { data: 'brand_name' },

//             { data: 'description' },

//             { data: 'sell_price' },

//             { data: 'cost_price' },

//             {
//                 data: null,
//                 render: function (data, type, row) {
//                     return "<a href='#' class = 'editBtn' id='editbtn' data-id=" + data.stock_id + "><i class='fas fa-edit' aria-hidden='true' style='font-size:24px' ></i></a><a href='#'  class='deletebtn' data-id=" + data.stock_id + "><i  class='fas fa-trash-alt' style='font-size:24px; color:red' ></a></i>";
//                 }
//             }
//         ],
//     }); // end datatable

//     $('#productAdd').on('click', function(e) {
//         $('#productModal').modal('show');
//             $.ajax({
//                 url: "/api/availableProduct", // Endpoint to fetch products
//                 method: "GET",
//                 success: function(data) {
//                     var productSelect = $('#product_name');
//                     productSelect.empty(); // Clear previous options
//                     productSelect.append('<option value="">Select a product</option>'); // Default option
//                     data.forEach(function(product) {
//                         productSelect.append(new Option(product.product_name, product.product_id));
//                     });
//                 },
//                 error: function(xhr) {
//                     console.error(xhr.responseText);
//                 }
//             });
//     });
    

//     $("#itemSubmit").on('click', function (e) {
//         e.preventDefault();
//         var data = $('#iform')[0];
//         console.log(data);
//         let formData = new FormData(data);
//         console.log(formData);
//         for (var pair of formData.entries()) {
//             console.log(pair[0] + ', ' + pair[1]);
//         }
//         $.ajax({
//             type: "POST",
//             url: "/api/product",
//             data: formData,
//             contentType: false,
//             processData: false,
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             dataType: "json",
//             success: function (data) {
//                 console.log(data);
//                 $("#productModal").modal("hide");
//                 var $itable = $('#itable').DataTable();
//                 // $itable.row.add(data.results).draw(false);
//                 $itable.ajax.reload()
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });

//     $('#stable tbody').on('click', 'a.editBtn', function (e) {
//         e.preventDefault();
//         $('#itemImage').remove()
//         $('#stock_id').remove()
//         $("#sform").trigger("reset");
//         // var id = $(e.relatedTarget).attr('data-id');
//         console.log(id);

       
//         var id = $(this).data('id');
//         $('<input>').attr({ type: 'hidden', id: 'stockId', name: 'product_id', value: id }).appendTo('#iform');
//         $('#productModal').modal('show');
//         $('#itemSubmit').hide()
//         $('#itemUpdate').show()

//         $.ajax({
//             type: "GET",
//             url: `http://localhost:8000/api/product/${id}`,
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             dataType: "json",
//             success: function (data) {
//                 console.log(data);
//                 $('#desc').val(data.name)
//                 $("#iform").append(`<img src=" ${data.images}" width='200px', height='200px' id="itemImage"   />`)

//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });

//     $("#itemUpdate").on('click', function (e) {
//         e.preventDefault();
//         var id = $('#productId').val();
//         console.log(id);
//         var table = $('#itable').DataTable();
//         // var cRow = $("tr td:eq(" + id + ")").closest('tr');
//         var data = $('#iform')[0];
//         let formData = new FormData(data);
//         formData.append("_method", "PUT")
//         // // var formData = $("#cform").serialize();
//         // console.log(formData);
//         // formData.append('_method', 'PUT')
//         // for (var pair of formData.entries()) {
//         //     console.log(pair[0] + ', ' + pair[1]);
//         // }
//         $.ajax({
//             type: "POST",
//             url: `http://localhost:8000/api/product/${id}`,
//             data: formData,
//             contentType: false,
//             processData: false,
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             dataType: "json",
//             success: function (data) {
//                 console.log(data);
//                 $('#productModal').modal("hide");

//                 table.ajax.reload()

//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });

//     $('#itable tbody').on('click', 'a.deletebtn', function (e) {
//         e.preventDefault();
//         var table = $('#itable').DataTable();
//         var id = $(this).data('id');
//         var $row = $(this).closest('tr');
//         console.log(id);
//         bootbox.confirm({
//             message: "do you want to delete this item",
//             buttons: {
//                 confirm: {
//                     label: 'yes',
//                     className: 'btn-success'
//                 },
//                 cancel: {
//                     label: 'no',
//                     className: 'btn-danger'
//                 }
//             },
//             callback: function (result) {
//                 console.log(result);
//                 if (result)
//                     $.ajax({
//                         type: "DELETE",
//                         url: `http://localhost:8000/api/product/${id}`,
//                         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//                         dataType: "json",
//                         success: function (data) {
//                             console.log(data);
//                             $row.fadeOut(4000, function () {
//                                 table.row($row).remove().draw();
//                             });

//                             bootbox.alert(data.success);
//                         },
//                         error: function (error) {
//                             bootbox.alert(data.error);
//                         }
//                     });
//             }
//         });
//     })
// })

$(document).ready(function () {
    var table = $('#ptable').DataTable();
    table.destroy();
    $('#ptable').DataTable({
        ajax: {
            url: "/api/product",
            dataSrc: ""
        },
        dom: 'Bfrtip',
        buttons: [
            'pdf',
            'excel',
            {
                text: 'Add stock',
                className: 'btn btn-primary',
                action: function (e, dt, node, config) {
                    $("#sform").trigger("reset");
                    $('#productModal').modal('show');
                    $('#productUpdate').hide();
                }
            }
        ],
        columns: [
            { data: 'product_id' },
            { data: 'product_name' },
            { data: 'brand_id' },
            { data: 'brand_name' },
            { data: 'description' },
            { data: 'sell_price' },
            { data: 'cost_price' },
            {
                data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='editBtn' id='editbtn' data-id=" + data.product_id + "><i class='fas fa-edit' aria-hidden='true' style='font-size:24px'></i></a><a href='#' class='deletebtn' data-id=" + data.product_id + "><i class='fas fa-trash-alt' style='font-size:24px; color:red'></a></i>";
                }
            }
        ]
    });

    // $('#productAdd').on('click', function(e) {
    //     $('#productModal').modal('show');
    //     $.ajax({
    //         url: "/api/product",
    //         method: "GET",
    //         success: function(data) {
    //             var brandSelect = $('#brand_name');
    //             brandSelect.empty(); // Clear previous options
    //             brandSelect.append('<option value="">Select a brand</option>'); // Default option
    //             $.each(data, function(index, brand) {
    //                 brandSelect.append($('<option>', {
    //                     value: brand.brand_id, // Use brand.brand_id instead of brand.id
    //                     text: brand.name
    //                 }));
    //             });
    //         },
    //         error: function(xhr) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // });


    //RE DO
    // function populateSelectOptions(selectId, data) {
    //     var select = $(selectId);
    //     select.empty(); // Clear previous options
    //     select.append('<option value="">--Select--</option>'); // Default option
    //     $.each(data, function(index, item) {
    //         select.append($('<option>', {
    //             value: item.brand_id, // Assuming 'brand_id' is the correct field name from your database
    //             text: item.name // Assuming 'name' is the correct field name from your database
    //         }));
    //     });
    // }
    
    // $('#productAdd').on('click', function(e) {
    //     $('#productModal').modal('show');
        
    //     // Function to fetch brands
    //     function getBrands() {
    //         $.ajax({
    //             url: "/api/brands",
    //             method: "GET",
    //             success: function(data) {
    //                 populateSelectOptions('#brand_name', data); // Populate brand select options
    //             },
    //             error: function(xhr, status, error) {
    //                 console.error('Error fetching brands:', xhr.responseText); // Log error message
    //             }
    //         });
    //     }
    //     // Call getBrands function when modal opens
    //     getBrands();
    // });


    $('#productAdd').on('click', function(e) {
        $.ajax({
            url: "/api/brands", // Endpoint to fetch products
            method: "GET",
            success: function(data) {
                var brandSelect = $('#brand_name');
                brandSelect.empty(); // Clear previous options
                brandSelect.append('<option value="">Select a brand</option>'); // Default option
                data.forEach(function(product) {
                    brandSelect.append(new Option(brands.brand_id, brands.name));
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
});
    

    $('#productSubmit').on('click', function(e) {
        e.preventDefault(); // Prevent default form submission
        var formData = $('#pform').serialize(); // Serialize form data
        // AJAX submission or any other handling
    });
    

    $("#itemSubmit").on('click', function (e) {
        e.preventDefault();
        var data = $('#pform').serialize(); // Correct form id here
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/api/product",
            data: data,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#productModal").modal("hide");
                var $itable = $('#itable').DataTable();
                $itable.ajax.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });


    $('#ptable tbody').on('click', 'a.editBtn', function (e) {
        e.preventDefault();
        $("#pform").trigger("reset");
        var id = $(this).data('id');
        $('<input>').attr({ type: 'hidden', id: 'productId', name: 'product_id', value: id }).appendTo('#pform');
        $('#productModal').modal('show');
        $('#itemSubmit').hide();
        $('#itemUpdate').show();
        fetchBrands();

        $.ajax({
            type: "GET",
            url: `/api/product/${id}`,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                $('#product').val(data.product_name);
                $('#brand_name').val(data.brand_id);
                $('#proddesc').val(data.description);
                $('#sellprice').val(data.sell_price);
                $('#costprice').val(data.cost_price);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#itemUpdate").on('click', function (e) {
        e.preventDefault();
        var id = $('#productId').val();
        var data = $('#pform')[0];
        let formData = new FormData(data);
        formData.append("_method", "PUT");
        $.ajax({
            type: "POST",
            url: `/api/product/${id}`,
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#productModal').modal("hide");
                var table = $('#ptable').DataTable();
                table.ajax.reload();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#ptable tbody').on('click', 'a.deleteBtn', function (e) {
        e.preventDefault();
        var table = $('#ptable').DataTable();
        var id = $(this).data('id');
        var $row = $(this).closest('tr');
        bootbox.confirm({
            message: "Do you want to delete this item?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result)
                    $.ajax({
                        type: "DELETE",
                        url: `/api/product/${id}`,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: "json",
                        success: function (data) {
                            $row.fadeOut(4000, function () {
                                table.row($row).remove().draw();
                            });
                            bootbox.alert(data.success);
                        },
                        error: function (error) {
                            bootbox.alert(data.error);
                        }
                    });
            }
        });
    });
});
