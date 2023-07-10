$(document).ready(function() {
    $('.remove-from-cart').click(function() {
        var key = $(this).data('key');
        $.ajax({
            url: 'remove_from_cart.php',
            type: 'POST',
            data: { key: key },
            success: function(response) {
                location.reload();
            }
        });
    });

    $('.quantity-input').change(function() {
        var key = $(this).data('key');
        var quantity = $(this).val();

        $.ajax({
            url: 'update_cart_item.php',
            type: 'POST',
            data: { key: key, quantity: quantity },
            dataType: 'json',
            success: function(response) {
                $('.total-amount').text('Total Amount: $' + response.totalAmount);
                $('.cart-table tr:eq(' + (key + 1) + ') td:eq(3)').text('$' + response.total);
            }
        });
    });
    
    $('#place-order-form').submit(function(event) {
        event.preventDefault(); 
        
        var name = $('#name').val();
        var surname = $('#surname').val();
        var address = $('#address').val();
        var telephone = $('#telephone').val();

        $.ajax({
            url: 'place_order.php',
            type: 'POST',
            data: {
                name: name,
                surname: surname,
                address: address,
                telephone: telephone
            },
            success: function(response) {
                alert(response);
                if (response.indexOf('successfully') !== -1) {
                    $('.cart-table').remove();
                    $('.total-amount').remove();
                    $('#customer-form').trigger('reset');
                }
            }
        });
    });
    

    $("#cart-badge").click(function() {
       
        $('#mini-cart-container').toggleClass("active");
      });
});

function goBack() {
    window.history.back();
}
function goToIndex() {
    window.location.href = "index.php";
  }