<?php
require_once "../blocks/functions.php";
/** Error reporting */
// error_reporting(E_ALL);

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');

/** PHPExcel */
include 'Classes/PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'Classes/PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
$objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Hive name');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Observation date');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Duration of Observation (in days)');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Mite Count');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Created date');

$objPHPExcel->getActiveSheet()->freezePane('A2');
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

if ($_GET['id'] == 'all') {
	$sql = "SELECT * FROM observation";
	$result = queryMysql($sql);
	$rows = $result->num_rows;

	if ($rows != 0) {
		for ($i=0, $j=2; $i < $rows; $i++, $j++) { 
			// $result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $j, $row['observation_id'])
										  ->SetCellValue('B' . $j, $row['hive_name'])
										  ->SetCellValue('C' . $j, $row['observation_date'])
										  ->SetCellValue('D' . $j, $row['duration'])
										  ->SetCellValue('E' . $j, $row['mite_count'])
										  ->SetCellValue('F' . $j, $row['submit_date']);
		}
		$objPHPExcel->setActiveSheetIndex(0);
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	}
}
else {
	$objPHPExcel->getActiveSheet()->SetCellValue('A2', $_GET['id']);
	$objPHPExcel->getActiveSheet()->SetCellValue('B2', $_GET['name']);
	$objPHPExcel->getActiveSheet()->SetCellValue('C2', $_GET['obs_date']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D2', $_GET['duration']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E2', $_GET['mite']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F2', $_GET['date']);

	// Rename sheet
	$objPHPExcel->getActiveSheet()->setTitle('Simple');
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
}








		
// Save Excel 2007 file

$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

$filename = (str_replace('.php', '.xlsx', __FILE__));
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=' . $filename);
ob_clean();
readfile($filename);

	// if (file_exists($filename)) {
	// 	unlink($filename);
	// }