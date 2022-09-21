<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function index(){
      // - Controller xử lí submit form
      // echo '<pre>';
      // print_r($_POST);
      // echo '</pre>';
      if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $note = $_POST['note'];
        $method = $_POST['method'];
        if (empty($this->error)) {
          // - Insert dữ liệu vào bảng orders trước 
          // Controller gọi model insert dữ liệu vào bảng orders, chú ý cần trả về id của order vừa insert thành công, chứ ko phải TRUE/FALSE
          $payment_status = 0; //chưa thanh toán
          $price_total = 0; 
          foreach ($_SESSION['cart'] AS $cart_item){
            $price_total += $cart_item['price']*$cart_item['quantity']; 
          }
          $infos = [
            'fullname' => $fullname,
            'address' => $address,
            'mobile' => $mobile,
            'email' => $email,
            'note' => $note,
            'price_total' => $price_total,
            'payment_status' => $payment_status,
          ];

          $order_model = new Order();
          $order_id = $order_model->insertData($infos);
          var_dump($order_id);

          // - Insert dữ liệu vào bảng order_details
          foreach ($_SESSION['cart'] AS $cart_item){
            $order_detail_model = new OrderDetail();
            $details = [
              'order_id' => $order_id,
              'product_name' => $cart_item['name'],
              'product_price' => $cart_item['price'],
              'quantity' =>$cart_item['quantity']
            ];
            $is_insert = $order_detail_model->insertDetail($details);
            var_dump($is_insert);
          }
        }
      }


      // - Controller gọi View:
      $this->page_title = 'Trang thanh toán';
      $this->content =
        $this->render(file:'views/payments/index.php');
      require_once 'views/layouts/main.php';
    }
}