import './bootstrap';

$(document).ready(function(){
    // Adding product
    $('#addproduct').click(function(e){
        let name = $('#name').val();
        let quantity = $('#quantity').val();
        let price = $('#price').val();
        let url = $('#products_url').attr('url');

        console.log(url);

        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: url,
          method: 'post',
          data: {
            name: name,
            quantity: quantity,
            price: price
          },
          success: function(result){
            $('#product-success').removeClass('d-none');
            $('#products_data').html(result);
            clearForm();
          },
          error: function (data) {
            alert('Something went wrong, please try again.');
          }
        });
    });

    // Editing product
    $(document).on('click', '.editproduct', function(e){
        let product_index = $(this).attr('productindex');
        let url = $('#products_url').attr('url');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url + '/' + product_index,
            method: 'get',
            success: function(result){
                $('#ep_name').val(result.name);
                $('#ep_quantity').val(result.quantity);
                $('#ep_price').val(result.price);
                $('#ep_index').val(product_index);
                $('#editProductModal').modal('show');
            },
            error: function (data) {
                alert('Something went wrong, please try again.');
            }
        });
    });

    // Updating product
    $('#updateproduct').click(function(e){
        let product_index = $('#ep_index').val();
        let name = $('#ep_name').val();
        let quantity = $('#ep_quantity').val();
        let price = $('#ep_price').val();
        let url = $('#products_url').attr('url');
  
        e.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: url + '/' + product_index,
          method: 'put',
          data: {
            name: name,
            quantity: quantity,
            price: price
          },
          success: function(result){
            $('#products_data').html(result);
            $('#editProductModal').modal('hide');
            $('#product-update-success').removeClass('d-none');
            clearForm();
          },
          error: function (data) {
            clearForm();
            alert('Something went wrong, please try again.');
          }
        });
    });

    function clearForm() {
        $('#name').val('');
        $('#quantity').val('');
        $('#price').val('');
    }
});