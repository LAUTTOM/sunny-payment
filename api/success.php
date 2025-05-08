<?php
// 获取支付成功的信息
$transactionID = $_POST['transaction_id'] ?? 'No transaction ID';
$orderID = $_POST['order_id'] ?? 'No order ID';
$amount = $_POST['amount'] ?? '0';
$status = $_POST['status'] ?? 'Success';
$date = date("Y-m-d H:i:s");

// 邮件内容
$to = "lau240708@outlook.com";  // 商户的邮箱
$subject = "Payment Success Notification";  // 主题
$message = "Payment Status: $status\n";
$message .= "Transaction ID: $transactionID\n";
$message .= "Order ID: $orderID\n";
$message .= "Amount: $amount\n";
$message .= "Date: $date\n";

// 发送邮件
mail($to, $subject, $message);

echo "Success notification sent.";
?>
