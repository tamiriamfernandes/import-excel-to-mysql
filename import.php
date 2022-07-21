<?php  

require_once("conexao/conexao.php");
require ('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

$arquivo = $_FILES['arquivo']['tmp_name'];

// read excel spreadsheet
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($arquivo);  
$sheetData = $spreadsheet->getActiveSheet()->toArray();

	$i = 0; 
	$passouCabeçalho = false;

	foreach($sheetData as $key => $value)
	{		
		if(str_contains(strtolower($value[0]), 'fornecedor')){
			$passouCabeçalho = true;
			continue;
		}

		if($passouCabeçalho){
			
			if(isset($value[0])){
				$query = "INSERT INTO financeiro(fornecedor,vencimento,a_pagar,categoria,cc,nf, status)
				VALUES(:fornecedor,:vencimento,:a_pagar,:categoria,:cc,:nf, 'A')";
		
				$stmt = $conn->prepare($query);
				$stmt->bindValue(':fornecedor',trim($value[0]));
				$stmt->bindValue(':vencimento',trim(Date::excelToDateTimeObject($value[1])->format('Y-m-d')));
				$stmt->bindValue(':a_pagar',trim($value[2]));
				$stmt->bindValue(':categoria',trim($value[3]));
				$stmt->bindValue(':cc',trim($value[4]));
				$stmt->bindValue(':nf',trim($value[5]));
		
				$result = $stmt->execute();
		
				if(!$result)
				{
					print_r($stmt->errorInfo());
				}
			}
		}
	}

	$retorno = "sucesso";

	echo json_encode($retorno);
	die();
?>
