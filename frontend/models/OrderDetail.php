<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
    public function insertDetail($details){
      $sql_insert = "INSERT INTO order_details(order_id,product_name,product_price,quantity)
                     VALUES (:order_id,:product_name,:product_price,:quantity)";
      $obj_insert = $this->connection->prepare($sql_insert);
      $inserts = [
        ':order_id' => $details['order_id'],
        ':product_name' => $details['product_name'],
        ':product_price' => $details['product_price'],
        ':quantity' => $details['quantity']
      ];
      // $is_insert = $order_detail_model->insertDetail($details);
      // var_dump($is_insert);
      return $obj_insert->execute($inserts);  
    }
    // - Gửi mail xác nhận đơn hàng cho user
  }
    // - Dựa vào phương thức thanh toán là COD hay online để chuyển hướng cho phù hợp
    // if ($method==0) {
      // Thanh toán trực tuyến: tích hợp ngân lượng
    // } else {
      // Thanh toán COD, chuyển hướng trang cảm ơn
    // }
