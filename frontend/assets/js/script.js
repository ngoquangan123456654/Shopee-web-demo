// mvc/frontend/assets/js/script.js
$(document).ready(function(){
  // Tải lại trang theo cơ chế xóa cache trình duyệt
  // CTRL SHIFT R
  // alert('Hell');
  $('.add-to-cart').click(function(){
      // alert('click');
      var product_id = $(this).attr('data-id');
      // alert(product_id);
      // -Gọi ajax để nhờ PHP thêm sp hiện tại vào giỏ :
      $.ajax({
        //Url xử lý ajax
        url: 'index.php?controller=cart&action=add',
        // Phương thức gửi dữ liệu: get, post, put, delete
        method: 'get',
        // Dữ liệu gửi đi
        data: {product_id: product_id},
        // Nơi nhận dữ liệu trả về từ PHP
        success: function(data){
          // console.log(data);
          // - Hiện thị thông báo cho user
          $('.ajax-message')
             .html('Thêm mới thành công')
             .addClass('ajax-message-active');
          // Ẩn message sau 3s
          setTimeout(function(){
                        $('.ajax-message').removeClass('ajax-message-active');
                    }, 3000);
          // - cập nhật số lượng item trong giỏ lên 1
          var cart_total = $('.cart-amount').html();
          cart_total++;
          $('.cart-amount').html(cart_total);
        }
      });
  })
})