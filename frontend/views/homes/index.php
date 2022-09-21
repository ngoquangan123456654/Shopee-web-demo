<?php
require_once 'helpers/Helper.php';
?>


<!-- CONTAINER -->
<div class="web-container">
    <?php if (!empty($products)): ?>
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-2">
                <!-- Danh mục sp -->
                <nav class="category">
                    <h3 class="category-heading">
                        <i class="category-heading-icon fa-solid fa-list"></i>
                        Danh mục
                    </h3>
                    <ul class="category-list">
                        <li class="category-item category-item--active"><a class="category-item__link" href="#">Best seller</a></li>
                        <li class="category-item"><a class="category-item__link" href="#">Tai nghe over-ear</a></li>
                        <li class="category-item"><a class="category-item__link" href="#">Tai nghe on-ear</a></li>
                        <li class="category-item"><a class="category-item__link" href="#">Tai nghe in-ear</a></li>
                        <li class="category-item"><a class="category-item__link" href="#">Khác</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Product -->
            <div class="grid__column-10">
                <div class="home-filter">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <button class="home-filter__btn btn">Phổ biến</button>
                    <button class="home-filter__btn btn btn--primary">Mới nhất</button>    
                    <button class="home-filter__btn btn">Bán chạy</button>    

                    <div class="select-input">
                        <span class="select-input__label">Giá</span>
                        <i class="select-input__icon fa-solid fa-angle-down"></i>
                        <ul class="select-input__list">
                            <li class="select-input__item"><a href="" class="select-input__link">Giá: Thấp đến cao</a></li>
                            <li class="select-input__item"><a href="" class="select-input__link">Giá: Cao đến thấp</a></li>
                        </ul>
                    </div>

                    <div class="home-filter__page ">
                        <span class="page__number">
                            <span class="page__current">1</span>/14    
                        </span>
                        <div class="page__control">
                            <a href="" class="page__btn  page__btn--disabled">
                                <i class="page__btn-icon fa-solid fa-angle-left"></i>
                            </a>
                            <a href="" class="page__btn">
                                <i class="page__btn-icon fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="home-product">
                    <div class="grid__row">
                        <!-- Product item -->
                        <?php foreach ($products AS $product):
                        $slug = Helper::getSlug($product['title']);
                        $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                        $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                        ?>
                            <div class="grid__column-one-fifth home-product-item__wrap">
                                <a class="home-product-item" href="<?php echo $product_link; ?>">
                                    <div class="home-product-item__img" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>" style="background-image:url(../backend/assets/uploads/<?php echo $product['avatar'] ?>"></div>
                                    <div class="home-product-item__info">
                                        <h4 class="home-product-item__title"><?php echo $product['title'] ?></h4>
                                        <div class="home-product-item__price">
                                            <span class="home-product-item__price-old"><?php echo number_format($product['price']) ?></span>
                                            <span class="home-product-item__price-current"><?php echo number_format($product['price']) ?></span>
                                        </div>
                                        <div class="home-product-item__action">
                                            <span class="home-product-item__rating">
                                                <i class="home-product-item__rating--gold fa-solid fa-star"></i>
                                                <i class="home-product-item__rating--gold fa-solid fa-star"></i>
                                                <i class="home-product-item__rating--gold fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <span class="home-product-item__sold">Đã bán 289</span>
                                        </div>
                                        <span class="home-product-item__origin">Hà Nội</span>
                                    </div>
                                    
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span class="">Yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__sale-off-percent">0%</span>
                                        <span class="home-product-item__sale-off-label">Giảm</span>
                                    </div>                                    
                                </a>
                                <span class="add-to-cart btn btn--primary" data-id="<?php echo $product['id']; ?>">
                                    <a href="#" style="color: inherit">Thêm vào giỏ</a>
                                </span>
                            </div>
                            
                        <?php endforeach; ?>
                                                      
                                
                    </div>
                </div>

                <ul class="pagination  home-product__pagination">
                    <li class="pagination__item">
                        <a href="" class="pagination__item-link">
                            <i class="pagination__item-icon fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="pagination__item pagination__item--active"><a href="" class="pagination__item-link">1</a></li>
                    <li class="pagination__item"><a href="" class="pagination__item-link">2</a></li>
                    <li class="pagination__item"><a href="" class="pagination__item-link">3</a></li>
                    <li class="pagination__item"><a href="" class="pagination__item-link">...</a></li>
                    <li class="pagination__item"><a href="" class="pagination__item-link">14</a></li>
                    <li class="pagination__item">
                        <a href="" class="pagination__item-link">
                            <i class="pagination__item-icon fa-solid fa-angle-right"></i>
                        </a>
                    </li>    
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
<!--    END PRODUCT-->

