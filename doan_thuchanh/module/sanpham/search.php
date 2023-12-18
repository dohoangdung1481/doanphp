<?php
if (!defined("ROOT"))
{
	echo "Err!"; exit;	
}
$key = getIndex("key", "");
$sql ="select * from book where book_name like :key ";
$arr = array(":key"=> "%".$key."%");
$page = Utils::getIndex("page", 1);
$list = $sanpham->search($page);

echo "Page $page/ ".$sanpham->getPageCount() ;
foreach($list as $r)
{
	?>
    <div class=sanpham>
    	<?php echo $r["tensp"];?>
    </div>
    <?php	
}

?>
<div>
<?php
for($i=1; $i<=$sanpham->getPageCount(); $i++)
{
	echo "<a href='index.php?mod=sanpham&ac=search&key=$key&page=$i'>$i</a>&nbsp;";	
}
?>
</div>