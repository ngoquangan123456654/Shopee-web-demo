<?php
// controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function add(){
    // - Lấy id của sp gửi lên từ ajax
    $product_id = $_GET['product_id'];
    // - Controller gọi Model để lấy sp theo id 
    $product_model = new Product();
    $product = $product_model->getById($product_id);
    // echo '<pre>';
    // print_r($product);
    // echo '</pre>';
    // - Tạo mảng lưu thông tin của item thêm vào giỏ hàng 
    $cart_item = [
      'name' => $product['title'],
      'avatar' => $product['avatar'],
      'price' => $product['price'],
      'quantity' => 1 //Mặc định chỉ thêm 1 sp 
    ];
    // - Logic chính :
    // + Nếu giỏ hàng chưa tồn tại, thi phải khởi tạo và thêm item đầu tiên vào giỏ hàng 
    // + Nếu giỏ hàng đã tồn tại, thì ó 2 trường hợp :
    // Th1: Sp đang thêm đã tồn tại trong giỏ hàng, thì update số lượng lên 1 
    // Th2: Sp đang thêm mà chưa tồn tại, thì thêm mới  
    if (!isset($_SESSION['cart'])){
      $_SESSION['cart'][$product_id] = $cart_item;
    } else {
      if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]['quantity']++;
      } else {
        $_SESSION['cart'][$product_id] = $cart_item;
      }
    }
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';
  }

  public function index() {
    // - Controller xử lí submit form - cập nhật giỏ hàng :
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    if (isset($_POST['submit'])) {
      // Cập nhật số lượng mới cho các sp trong giỏ :
      foreach($_SESSION['cart'] AS $product_id => $cart_item){
        // Xử lí số lượng là âm
        if ($_POST[$product_id] < 0) {
          $_SESSION['error'] = 'Số lượng ko thể âm';
          header(header:'Location:gio-hang-cua-ban.html');
          exit();
        }

        $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
      } 
      $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
    }

    // - Controller gọi view 
    $this->page_title = 'Giỏ hàng của bạn';
    $this->content = $this->render(file:'views/carts/index.php');
    require_once 'views/layouts/main.php';
  }

  public function delete() {
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
    $product_id = $_GET['id'];
    unset($_SESSION['cart'][$product_id]);
    $_SESSION['success'] = 'Xóa sp thành công';
    header(header:'Location: gio-hang-cua-ban.html');
    exit();

    // thanh-toan.html
    // san-pham/abc/5.html
  }
}