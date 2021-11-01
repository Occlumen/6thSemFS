<?php
session_start();

include_once("../fpdf/fpdf.php");

if($_GET["order_date"] && $_GET["invoice_no"])
{
    $pdf = new  FPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(190,15,"Coffee Billing Management System",0,1,"C");
    $pdf->SetFont("Arial",null, 12);
    $pdf->Cell(40,10,"Order Date  :",0,0);
    $pdf->Cell(40,10,$_GET["order_date"],0,1);
    $pdf->Cell(40, 10, "Customer Name  :", 0, 0);
    $pdf->Cell(40, 10, $_GET["cust_name"], 0, 1);

    $pdf->Cell(50, 15, "", 0, 1);

    $pdf->Cell(10, 10, "#", 1, 0, "C");
    $pdf->Cell(70, 10, "Product Name", 1, 0, "C");
    $pdf->Cell(30, 10, "Quantity", 1, 0, "C");
    $pdf->Cell(40, 10, "Price", 1, 0, "C");
    $pdf->Cell(40, 10, "Total (Rs)", 1, 1, "C");

     
    for ($i=0; $i < count($_GET["pid"]); $i++)
    {
        $pdf->Cell(10, 10,($i+1), 1, 0, "C");
        $pdf->Cell(70, 10, $_GET["pro_name"][$i], 1, 0, "C");
        $pdf->Cell(30, 10, $_GET["qty"][$i], 1, 0, "C");
        $pdf->Cell(40, 10, $_GET["price"][$i], 1, 0, "C");
        $pdf->Cell(40, 10,($_GET["qty"][$i] * $_GET["price"][$i]), 1, 1, "C");
    }



    $pdf->Cell(50, 15, "", 0, 1);





    $pdf->Cell(50, 15, "Sub Total  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["sub_total"], 0, 1);
    $pdf->Cell(50, 15, "Gst Tax  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["gst"], 0, 1);
    $pdf->Cell(50, 15, "Discount  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["discount"], 0, 1);
    $pdf->Cell(50, 15, "Net Total  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["net_total"], 0, 1);
    $pdf->Cell(50, 15, "Paid  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["paid"], 0, 1);
    $pdf->Cell(50, 15, "Due Amount  :", 0, 0);
    $pdf->Cell(50, 15, $_GET["due"], 0, 1);
    $pdf->Cell(50, 15, "Payment Type :", 0, 0);
    $pdf->Cell(50, 15, $_GET["payment_type"], 0, 1);

    $pdf->Cell(180, 15,"Signature", 0, 0,"R");
    
    //$pdf->Cell("../PDF_BILL/PDF_BILL_".$_GET["invoice_no"].".pdf","F");

    $pdf->Output();
}

?>