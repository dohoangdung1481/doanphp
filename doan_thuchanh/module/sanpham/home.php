 <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./image/sanpham/icho" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./image/sanpham/icho" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./image/sanpham/icho" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
        <p class="text-center fs-2 fw-bolder">Giới thiệu chung</p>
        <p class="text-center fs-4">Mo ta</p>
    </div>
    <div><h3>Sản Phẩm</h3></div>
    <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
        <?php
    $list = $sp->getRand(10);
    foreach($list as $r)
{
	?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $r["tensp"];?><br /></h5>
                        <p class="card-text"><?php echo $r["mota"];?></p>
                            <a href="index.php?mod=cart&ac=add&id=<?php echo $r["masp"];?>">Mua hàng</a>
                    </div>
                </div>
            </div>
           <div>
    <?php	
}
?>
           </div>
            