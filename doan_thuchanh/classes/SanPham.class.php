<?php
class SanPham extends Db {
    private $_page_size =5;//Một trang hiển hị 5 cuốn sách
	private $_page_count;
	public function getRand($n)
	{
		$sql="select masp, tensp,mota, anh from sanpham order by rand() limit 0, $n ";
		return $this->exeQuery($sql);	
	}
	
	
	public function delete($masp)
	{
		$sql="delete from sanpham where masp=:masp ";
		$arr =  Array(":masp"=>$masp);
		return $this->exeNoneQuery($sql, $arr);	
	}
	
	public function getDetail($masp)
	{
		$sql="select sanpham.*, tenloai, tenxx 
			from sanpham, phanloai, xuatxu
			where sanpham.maloai = phanloai.maloai
				and sanpham.maxx = xuatxu.maxx
				and masp=@masp ";
		$arr = array("@masp"=>$masp);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	
	public function getAll($currPage=1)
	{
		$offset = ($currPage -1) * $this->_page_size;
		$sql="SELECT
				Count(*)
				FROM
				phanloai
				INNER JOIN sanpham ON sanpham.maloai = phanloai.maloai
				INNER JOIN xuatxu ON sanpham.maxx = xuatxu.maxx";
				$n  = $this->count($sql);
				$this->_page_count = ceil($n/$this->_page_size);
		$sql="SELECT
				sanpham.masp,
				sanpham.tensp,
				sanpham.mota,
				sanpham.gia,
				sanpham.anh,
				sanpham.maloai,
				sanpham.maxx,
				phanloai.tenloai,
				xuatxu.nuocxx
				FROM
				phanloai
				INNER JOIN sanpham ON sanpham.maloai = phanloai.maloai
				INNER JOIN xuatxu ON sanpham.maxx = xuatxu.maxx
				limit $offset, " . $this->_page_size;
		
		return $this->exeQuery($sql);
	}
	
	public function search($currPage=1)
	{
		$key = Utils::getIndex("key");
		$arr = array(":tensp"=>"%". $key ."%");
		
		$offset = ($currPage -1) * $this->_page_size;
		$sql="SELECT
				Count(*)
				FROM
				phanloai
				INNER JOIN sanpham ON sanpham.maloai = phanloai.maloai
				INNER JOIN xuatxu ON sanpham.maxx = xuatxu.maxx
				where tensp like :tensp	";
				$n  = $this->count($sql, $arr);
				$this->_page_count = ceil($n/$this->_page_size);
		$sql="SELECT
				sanpham.sanpham_id,
				sanpham.tensp,
				sanpham.mota,
				sanpham.gia,
				sanpham.anh,
				sanpham.maxx,
				sanpham.maloai,
				phanloai.tenloai,
				xuatxu.nuocxx
				FROM
				phanloai
				INNER JOIN sanpham ON sanpham.maloai = phanloai.maloai
				INNER JOIN xuatxu ON sanpham.maxx = xuatxu.maxx
				where tensp like :tensp	
				limit $offset, " . $this->_page_size;
						
		return $this->exeQuery($sql, $arr);
	}
	
	public function count($sql, $arr=array())
	{
		return $this->countItems($sql, $arr);
	}
	
	public function getPageCount()
	{
		return $this->_page_count;	
	}
}
?>