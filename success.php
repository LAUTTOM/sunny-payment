<?php
// 收件人邮箱地址
$to = "lau240708@outlook.com";

// 收到的支付数据
$transactionID = $_POST['transaction_id'] ?? 'No transaction ID';
$orderID = $_POST['order_id'] ?? 'No order ID';
$amount = $_POST['amount'] ?? '0';
$paymentStatus = "Success";
$date = date("Y-m-d H:i:s");

// 邮件主题和内容
$subject = "Payeer Payment Successful";
$message = "Payment Status: $paymentStatus\n";
$message .= "Transaction ID: $transactionID\n";
$message .= "Order ID: $orderID\n";
$message .= "Amount: $amount\n";
$message .= "Date: $date\n";

// 发送邮件
mail($to, $subject, $message);

// 输出支付状态
echo "Payment Successful!";
?>
