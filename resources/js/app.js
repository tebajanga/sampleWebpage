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
            console.log(result);
          },
          error: function (data) {
            alert('Something went wrong, please try again.');
          }
        });
    });
});