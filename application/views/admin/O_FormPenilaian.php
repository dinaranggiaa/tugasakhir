<!DOCTYPE html>
<html>
<head>
	<title>Form Penilaian Pelamar</title>
</head>
<body>
	<table style="margin:auto; border: 0px solid black; width:100% ">
		<tr>
			<th style="border: 0px solid black; width:30%; padding-left:35px;"><img src="assets/img/logo-honda.jpg" style="position: absolute; width: 120px; height: auto; margin-top: 20px;"></th>
			<th style="margin: auto; border: 0px solid black; width:70%">
				<span style="border: 0px solid black; line-height: 1.6; font-weight: bold; font-size: 35px; font-family: sans-serif; padding-top: 0px; color:red; font-family:Verdana, Geneva, Tahoma, sans-serif";>PT JAYA UTAMA MOTOR</span><br>
				<span style="border: 0px solid black; line-height: 1.6; font-weight: bold; font-size: 15px; font-family: sans-serif; padding-top: 0px; color:red; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">DEALER RESMI MOTOR HONDA & AHASS 06986</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Jl. R.C. VETERAN 33-35 JAKARTA, INDONESIA</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">TELP.(021)73771499, 73691158 FAX.(021)7354548</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Email : jmjayamotor@gmail.com / jaya_motor@hotmail.com</span><br>
			</th>
		</tr>
	</table>
	
	<hr style="height: 3px; background-color: black;">
	
		<p style="text-align: center; font-size: 25px; margin: 5px;">Form Penilaian Pelamar</p>
	
	<style type="text/css">
		.inti {
			border-collapse: collapse;
		}
		.inti th, .inti td {
			border: 1px solid black;
		}
		th {
			text-align: center;
		}
		.inti th, .inti td {
			padding: 0px 15px;
		}
	</style>
    <br>

    <table style="font-size: medium; padding-bottom:5px;">  
    <tr style="padding-bottom: 3px;">
        <td style="font-weight: bold; padding-bottom: 13px;">Biodata Pelamar</td>
    </tr>              
    <tr>
        <td style="padding-bottom: 5px;"><label>Nama Lengkap</label></td>
        <td style="padding-bottom: 5px;">:</td>
        <td style="padding-bottom: 5px;">................................................................................................</td>
    </tr>   
    <tr>
        <td style="padding-bottom: 5px;"><label>Pendidikan Terakhir</label></td>
        <td style="padding-bottom: 5px;">:</td>
        <td style="padding-bottom: 5px;">O SMA / O D3 / O S1 *
        </td>
    </tr>   
    <tr>
        <td style="padding-bottom: 5px;"><label>Pengalaman Kerja</label></td>
        <td style="padding-bottom: 5px;">:</td>
        <td style="padding-bottom: 5px;">................................................................................................</td>
    </tr>
	</table>


	<table style="width:70%; margin:auto" class="inti" >
		<tr style="font-weight: bold; text-align:center">
			<td style="width: 5%;">No</td>
			<td>Kriteria Penilaian</td>
			<td>Nilai</td>
		</tr>
		
		<?php foreach ($subkriteria as $id_subkriteria => $row) : 
		$id_subkriteria++; ?>
		<tr>
			<td><?= $id_subkriteria ?></td>
			<td><?= $row -> nm_subkriteria ?></td>
			<td></td>
		</tr>
		<?php endforeach?>

	</table>

	<table style="font-size: medium; padding-bottom:10px; ">     
    <tr>
        <td style="padding-bottom: 10px;"><label>Catatan</label></td>
        <td style="padding-bottom: 10px;">:</td>

	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><label></label></td>
        <td style="padding-bottom: 10px;"></td>
		<td style="padding-bottom: 10px;">..............................................................................................................................................</td>
	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><label></label></td>
        <td style="padding-bottom: 10px;"></td>
		<td style="padding-bottom: 10px;">..............................................................................................................................................</td>
	</tr>
	<tr>
		<td style="padding-bottom: 10px;"><label></label></td>
        <td style="padding-bottom: 10px;"></td>
		<td style="padding-bottom: 10px;">..............................................................................................................................................</td>
	</tr>
		
    
    </table>
	
    
    <table style="font-size: smaller; width:40%;">  
        <tr>
            <td style="font-weight: bold; font-size: smaller;">Aspek Penilaian<br></td>
        </tr>              
        <tr>
            <td style="font-size: smaller; width:2%"><label>1 : Kurang Baik </label></td>
		</tr>
		<tr>
            <td style="font-size: smaller; width:2%"><label>2 : Bagus</label></td>
        </tr>
        <tr>
            <td style="font-size: smaller; width:2%"><label>3 : Cukup</label></td>
        </tr>  
        <tr>
            <td style="font-size: smaller; width:2%"><label>4 : Baik</label></td>
        </tr>
        <tr>
            <td style="font-size: smaller; width:2%"><label>5 : Sangat Baik</label></td>
        </tr> 
       
    </table>

		<br style="clear: both;"><br><br>

		<style type="text/css">
		    .demo-table {
		        border-collapse: collapse;
		        font-size: 15px;
		        width: 100%;
		        margin: 25px auto;
		        /*border: 1px solid black;*/
		        /*padding: 5px;*/
		      }

		    .demo-table td:first-child{
		      width: 210px;
		      text-align: center;
		    }

		    .demo-table td:nth-child(2) {
		      width: 190px;
		      text-align: left;
		    }
		    .demo-table td:last-child {
		    	width: 210px;
		    	text-align: center;
		    }

		    .demo-table td {
		      padding: 0px 17px;
		    }
		    /* Table Body */
		    .demo-table tbody td {
		      color: #353535;
		    }
          </style>
          
          <table class="demo-table" style="margin:auto" >
			<tr style="margin:auto">
                <td style="margin:auto">
                    <span>.............................................</span><br> 
					<span>Kepala Cabang</span><br> 
					<span>PT Jaya Utama Motor</span>
					<br> 
					<br> 
					<br> 
					<br>
					<br>
					<span>(Lutfi Amin)</span> 
				</td>
			</tr>
		</table>
        
        <table style="font-size: smaller; padding-top:5px; width:40%">  
        <tr style="padding-bottom: 3px;">
            <td style="font-size: smaller;">* : Beri tanda silang (X) pada pilihan yang sesuai<br></td>
        </tr>                  
    </table>

	</body>
</html>

    