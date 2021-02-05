<?php 
	function result($e,$ops){
		if ($ops == 'tambah') {
			$result = cekData($e['varA']) + cekData($e['varB']);
		}elseif ($ops == 'kurang') {
			$state = cekData($e['varA']) - cekData($e['varB']);
			if ($state < 0) {
				$result = $state + 26;
			}else{
				$result = cekData($e['varA']) - cekData($e['varB']);
			}
		}
		return $result;
	}

	function cekData($b){
		$abj = array('A' => 1,'B' => 2,'C' => 3,'D' => 4,'E' => 5,'F' => 6,'G' => 7,'H' => 8,'I' => 9,'J' => 10,'K' => 11,'L' => 12,'M' => 13,'N' => 14,'O' => 15,'P' => 16,'Q' => 17,'R' => 18,'S' => 19,'T' => 20,'U' => 21,'V' => 22,'W' => 23,'X' => 24,'Y' => 25,'Z' => 26,);
		if (is_numeric($b)) {
			$res = $b;
		}else{
			$ucword = strtoupper($b);
			$res = $abj[$ucword];
		}
		return $res;
	}

	function converter($c){
		$abj = array('A' => 1,'B' => 2,'C' => 3,'D' => 4,'E' => 5,'F' => 6,'G' => 7,'H' => 8,'I' => 9,'J' => 10,'K' => 11,'L' => 12,'M' => 13,'N' => 14,'O' => 15,'P' => 16,'Q' => 17,'R' => 18,'S' => 19,'T' => 20,'U' => 21,'V' => 22,'W' => 23,'X' => 24,'Y' => 25,'Z' => 26,);
		$agk = array(1 => 'A',2 => 'B',3 =>'C',4 => 'D',5 => 'E',6 => 'E',7 => 'G',8 => 'H',9 => 'I',10 => 'J',11 => 'K',12 => 'L',13 => 'M',14 => 'N',15 => 'O',16 => 'P',17 => 'Q',18 => 'R',19 => 'S',20 => 'T',21 => 'U',22 => 'V',23 => 'W',24 => 'X',25 => 'Y',26 => 'Z',);
		if (is_numeric($c)) {
			$res = $agk[$c];
		}else{
			$ucword = strtoupper($c);
			$res = $ucword;
		}
		return $res;
	}

if (isset($_POST['jule'])) {
	$val =array('varA' => $_POST['varA'],'varB' => $_POST['varB'] );
	$oper = $_POST['ops'];
	$ops = result($val,$oper);
	if ($ops > 26) {
		$val = 'Nilai akhir '.$ops.' dan tidak ditemukan Hurup untuk angka '.$ops;
	}else{
		$val = 'Hasil dari '.$oper.' '.strtoupper($_POST['varA']).' dan '.strtoupper($_POST['varB']).' adalah '.$ops.'/'.converter($ops);
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
 	<title>uji penguruangan</title>
 </head>
 <body>
 <center><h1>Form Pengurungan</h1></center>
 <form action="" method="post">
 	<input type="text" name="varA" placeholder="Nilai A">
 	<input type="text" name="varB" placeholder="Nilai B">
 	<select name="ops">
 		<option value="tambah">Penambahan</option>
 		<option value="kurang">Pengurangan</option>
 	</select>
 	<button type="submit" name="jule">KIRIM</button>
 </form>
 <br>
 <textarea><?php if (empty($val)) {
 	echo "Blom Ada Query";
 }else{
 	echo $val;
 } ?></textarea>
 </body>
 </html>