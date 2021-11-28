$(document).ready(function () {


    // calculate totalprice 
    $("#quantity").blur(function() {
            var quantity = parseFloat($('#quantity').val());
            var unitprice = parseFloat($('#unitprice').val());
            var totalprice = (quantity * unitprice);
            $('#totalprice').val( totalprice);
        });
    $("#unitprice").blur(function() {
            var quantity = parseFloat($('#quantity').val());
            var unitprice = parseFloat($('#unitprice').val());
            var totalprice = (quantity * unitprice);
            $('#totalprice').val(totalprice);
        });





        // calculate discount and totalamount
        $('#product_id').change(function() {
            var product_id = $(this).val();
            // alert(product_id);
            if (product_id != 0) {
                // fetch the data from the database --> product--> unitprice 
                // Ajax   --> Asynchronous 
                var xmlhttp = new XMLHttpRequest();   //xmlhttp.open()   xmlhttp.send()
                // $_post(url, data, callback function)   $_get(url, data, callback function)
                $.post('admin/product-find-price.php', 'p_id='+product_id, function(data) {
                    $('#unitprice').val(data);
                }); 
            }
        });





});