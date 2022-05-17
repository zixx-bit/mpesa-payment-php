<?php


header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "stkResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$callbackContent = json_decode($stkCallbackResponse);

$ResultCode = $callbackContent->Body->stkCallback->ResultCode;
$CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
$Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
$TransactionTime = $callbackContent->Body->stkCallback->CallbackMetadata->Item[3]->Value;

// $FirstName = $callbackContent->Body->stkCallback->FirstName;
$Amount2 = $callbackContent->Body->stkCallback->CallbackMetadata->Item[13]->Value;
// $callbackContent

if ($ResultCode === 0) {
  require_once $_SERVER['DOCUMENT_ROOT']. '/online store/core/init.php';
   $db->query("INSERT INTO
      payments(CheckoutRequestID,ResultCode,amount,MpesaReceiptNumber,PhoneNumber,FirstName,TransactionTime,Amount2)
   VALUES ('$CheckoutRequestID','$ResultCode','$Amount','$MpesaReceiptNumber','$PhoneNumber','$FirstName','$TransactionTime','$Amount2')");

 }
