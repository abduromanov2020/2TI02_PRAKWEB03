<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
	<title>BMI Pasien</title>
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Manrope', sans-serif;
		}

		body {
			color: #ffe3d8;
			background-color: #4b778d;
		}

		.wrapper {
			display: flex;
			justify-content: unset;
		}

		.container,.php {
			border-radius: 50px;
			margin: 80px auto;
			display: table;
			padding:40px;
			background-color: #03506f;
			box-shadow: 0px 0px 20px rgba(0,0,0,.5);
		}

		.php {
			margin-left: 0;
			width: 500px;
			text-align: center;
		}

		.php h2 {
			margin-bottom: 20px;
		}

		.php p {
			margin-bottom: 15px;
		}

		.title {
			text-align: center;
			margin-bottom: 20px;
		}

		.input-form {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px 5px;
		}

		.input-form input {
			width: 250px;
			padding: 5px 10px;
			border-radius: 50px;
			border:1px solid #888;
		}

		.input-form input:focus {
			outline:none;
		}

		.inputform {
			padding: 10px 5px;
		}

		.inputform label {
			margin-right: 80px;
		}

		.inputform input {
			margin: 0 10px;
		}

		input[type=number]::-webkit-inner-spin-button {
			-webkit-appearance: none;
		}

		input[type=submit] {
			color: #ffe3d8;
			background-color: #0a043c;
			display: table;
			margin: 20px auto 10px auto;
			padding:10px 100px;
			border-radius: 50px;
			border:1px solid transparent;
			cursor: pointer;
			box-shadow: 0px 0px 10px rgba(255,255,255,.3);
		}

		input[type=submit]:hover {
			background-color: transparent;
			border:1px solid #ccc;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="title">
				<h2>Form Isian Indeks Massa Tubuh (BMI)</h2>
			</div>
			<form action="class_bmipasien.php" method="POST">
				<div class="input-form">
					<label for="nama">Nama</label>
					<input type="text" name="nama" required="">
				</div>
				<div class="input-form">
					<label for="berat">Berat Badan</label>
					<input type="number" name="berat" step="any" required="">
				</div>
				<div class="input-form">
					<label for="tinggi">Tinggi Badan</label>
					<input type="number" name="tinggi" required="">
				</div>
				<div class="input-form">
					<label for="Umur">Umur</label>
					<input type="number" name="umur" required="">
				</div>
				<div class="inputform">
					<label for="jenisKelamin">Jenis Kelamin</label>
					<input type="radio" name="jenisKelamin" value="Laki laki" required="">Laki Laki
					<input type="radio" name="jenisKelamin" value="Perempuan" required="">Perempuan
				</div>
					<input type="submit" name="proses" value="Kirim">
			</form>
		</div>
		<?php 
		if (isset($_POST['proses'])) :
			$nama = $_POST['nama'];
			$berat = $_POST['berat'];
			$tinggi = $_POST['tinggi'];
			$umur = $_POST['umur'];
			$jenisKelamin = $_POST['jenisKelamin'];

		class Pasien {
			public  $nama,
					$umur,
					$jenisKelamin,
					$berat,
					$tinggi,
					$bmi;

			public function __construct( $nama, $umur, $jenisKelamin, $berat, $tinggi, $bmi = 0) {
				$this->nama = $nama;
				$this->umur = $umur;
				$this->jenisKelamin = $jenisKelamin;
				$this->berat = $berat;
				$this->tinggi = $tinggi;
				$this->bmi = $bmi;
			}

			public function hasilBMI() {
				$bmi = round($this->berat / (($this->tinggi / 100) * ($this->tinggi / 100)),2);
				$this->bmi = $bmi;
				return $bmi;
			}

			public function statusBMI() {
				if ($this->bmi<18.5) {
	 					return "Kekurangan Berat Badan";
	 				} elseif ($this->bmi<=24.9) {
	 					return "Normal (Ideal)";
	 				} elseif ($this->bmi<=29.9) {
	 					return "Kelebihan Berat Badan";
	 				} elseif ($this->bmi>=30.0) {
	 					return "Kegemukan (Obesitas)";
	 				}
			}

		}

		$pasien1 = new Pasien( $nama, $umur, $jenisKelamin, $berat, $tinggi);
		?>


		<div class="php">
			<h2>Hasil Evaluasi BMI</h2>
			<p>Nama : <?= $nama ?></p>
			<p>Berat/Tinggi Badan : <?= $berat ?> kg/<?= $tinggi ?> cm</p>
			<p>Umur : <?= $umur ?></p>
			<p>Jenis Kelamin : <?= $jenisKelamin ?></p>
			<p>BMI : <?= $pasien1->hasilBMI() ?></p>
			<p>Hasil : <?= $pasien1->statusBMI() ?></p>
		</div>

		<?php endif; ?>
	</div>


</body>
</html>











