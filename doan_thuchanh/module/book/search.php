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
foreach($list as $r)
{
	?>
    <div class=sp>
    	<?php echo $r["tensp"];?>
    </div>
    <?php	
}

?>
<div>
<?php
for($i=1; $i<=$sp->getPageCount(); $i++)
{
	echo "<a href='index.php?mod=sp&ac=search&key=$key&page=$i'>$i</a>&nbsp;";	
}
?>
</div>