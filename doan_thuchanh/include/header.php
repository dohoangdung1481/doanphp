<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="image/book/hinhlogo.jpg" height="150" alt=" Logo" loading="lazy" />
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div>
            <a class="nav-link" href="index.php ">
              Trang Chủ
            </a>
          </div>
          <?php include("include/category.php");?>
          <div><a class="nav-link" href="index.php?mod=cart">Giỏ hàng (<span id="cart_sumary"><?php echo  $cart->getNumItem();
                                                                                              ?></span>)</a></div>
          <form class="d-flex" role="search" action="index.php">
            <input type="hidden" name="mod" value="book" />
            <input type="hidden" name="ac" value="search" />
            <input class="form-control me-2" type="search" placeholder="Tìm Kiếm" aria-label="Search" name="key" value="<?php echo Utils::getIndex("key", ""); ?>">
            <button class="btn btn-outline-success" type="submit">Tìm</button>



      </div>
    </div>
  </nav>
  