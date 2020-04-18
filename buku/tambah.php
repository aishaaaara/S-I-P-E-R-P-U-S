<?php 
include '../koneksi.php';
include '../aset/header.php';
$query = mysqli_query($kon, "SELECT * FROM kategori");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <div class="container">
 	<div class="row mt-4">
 		<div class="col-md">
  <div class="card" style="width: 100%;">
 <div class="card-header" style="width: 100%;">
 	<h2 class="card-header"><i class="fas fas fa-book"></i> Tambah Data BUku</h2>
 </div>
 <div class="card-body"></div>

 <form action="proses-tambah.php" method="post">

 <table class="table">
 <tr>
 	<td>Judul</td>
    <td><input type="text" name="judul"></td>
</tr>
<tr>
 	<td>Penerbit</td>
    <td><input type="text" name="penerbit"></td>
</tr>
<tr>
 	<td>Pengarang</td>
    <td><input type="text" name="pengarang"></td>
</tr>
<tr>
 	<td>Ringkasan</td>
    <td><input type="text" name="ringkasan"></td>
</tr>
<tr>
 	<td>Cover</td>
    <td><input type="file" name="cover"></td>
</tr>
<tr>
 	<td>Stok</td>
    <td><input type="number" name="stok"></td>
    
</tr>
<tr>
	<td>Kategori</td>
	<td>
		<select style="width: 200px" name="id_kategori">
			<option value="">-- Pilih Kategori --</option>

			<?php 

			while ($kategori = mysqli_fetch_assoc($query)):

			 ?>
			<option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori'];?></option>

			<?php
			 endwhile;
			?>
		</select>
	</td>

</tr>
<tr>
 	<td></td>
    <td><button type="submit" class="btn btn-primary" name="simpan">Simpan</button></td>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
 </body>
 </html>


 <?php 
include '../aset/footer.php';
  ?>