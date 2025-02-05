<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once('db.php');
require_once('TCPDF/tcpdf.php'); // Include TCPDF library

// Fetch the logged-in user's record
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM register WHERE user_id = '$user_id'";
$result = mysqli_query($condb, $sql);
$user = mysqli_fetch_assoc($result);

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Clinic Medic');
$pdf->SetTitle('Patient Record');
$pdf->SetHeaderData('', 0, 'Clinic Medic', 'Patient Record Report', [0,64,255], [0,64,128]);
$pdf->setHeaderFont(['helvetica', '', 12]);
$pdf->setFooterFont(['helvetica', '', 10]);
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetMargins(15, 27, 15);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(10);
$pdf->SetAutoPageBreak(TRUE, 15);
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();

// Table Header
$html = '<h2 style="text-align: center;">Patient Record</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0">
    <tr style="background-color: #f2f2f2;">
        <th>ID</th>
        <th>Patient Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Date</th>
        <th>Medical History</th>
    </tr>';

// Populate Table with User Data
$html .= '<tr>
    <td>' . $user['user_id'] . '</td>
    <td>' . $user['name'] . '</td>
    <td>' . $user['gender'] . '</td>
    <td>' . $user['phone'] . '</td>
    <td>' . $user['email'] . '</td>
    <td>' . $user['date'] . '</td>
    <td>' . $user['medical_history'] . '</td>
</tr>';

$html .= '</table>';

// Output PDF
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('patient_record.pdf', 'I'); // 'I' for inline view in the browser
?>
