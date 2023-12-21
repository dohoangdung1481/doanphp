<?php
if (!defined("ROOT"))
{
	echo "Err!"; exit;	
}
$key = getIndex("key", "");
$sql ="select * from sanpham where tensp like :key ";
$arr = array(":key"=> "%".$key."%");
$page = Utils::getIndex("page", 1);
$list = $sp->search($page);

echo "Page $page/ ".$sp->getPageCount() ;

	?>
<div class="row">
    <?php foreach($list as $r){ ?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $r['anh']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $r["tensp"];?><br /></h5>
            <p class="card-text"><?php echo $r["mota"];?></p>
            <a class="btn btn-success"href="index.php?mod=cart&ac=add&id=<?php echo $r["masp"];?>">Thêm vào giỏ hàng</a>
        </div>
    </div>
    <?php } ?>
</div>

<div>
    <?php
for($i=1; $i<=$sp->getPageCount(); $i++)
{
	echo "<a href='index.php?mod=sanpham&ac=search&key=$key&page=$i'>$i</a>&nbsp;";	
}
?>
</div>