<?php
// 检查请求方法是否为 POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

// Payeer 商户后台中的 Secret Key
$secretKey = "Nq4C6hvC"; // 请将此处替换为你的实际 Secret Key

// 验证 Secret Key
if ($_POST['secret_key'] !== $secretKey) {
    echo "Invalid Secret Key";
    exit;
}

// 收件人邮箱地址
$to = "lau240708@outlook.com";

// 获取支付数据
$transactionID = $_POST['transaction_id'] ?? 'No transaction ID';
$orderID = $_POST['order_id'] ?? 'No order ID';
$amount = $_POST['amount'] ?? '0';
$paymentStatus = $_POST['status'] ?? 'Unknown';
$date = date("Y-m-d H:i:s");

// 邮件主题和内容
$subject = "Payeer Payment Notification";
$message = "Payment Status: $paymentStatus\n";
$message .= "Transaction ID: $transactionID\n";
$message .= "Order ID: $orderID\n";
$message .= "Amount: $amount\n";
$message .= "Date: $date\n";

// 发送邮件
mail($to, $subject, $message);

// 确认 Payeer 能收到响应
echo "Notification sent!";
?>
