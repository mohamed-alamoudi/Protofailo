<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Method Not Allowed');
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // للسماح بطلبات من أي مصدر (يمكنك تقييده لاحقاً)
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// استقبال البيانات المرسلة من العميل
$data = json_decode(file_get_contents('php://input'), true);
$question = $data['question'] ?? '';

if (empty($question)) {
    http_response_code(400);
    echo json_encode(['error' => 'الرجاء إدخال سؤال']);
    exit;
}

// مفتاح API الخاص بك - تأكد من تغييره!
require_once 'config.php';

// بيانات الطلب لـ Together API
$payload = [
    'model' => 'deepseek-coder',
    'messages' => [
        [
            'role' => 'system',
            'content' => 'You are an experienced software assistant'
        ],
        [
            'role' => 'user',
            'content' => $question
        ]
    ],
    'temperature' => 0.5,
    'max_tokens' => 800
];

// إعداد الطلب لـ Together API
$ch = curl_init('https://api.together.xyz/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key
    ]
]);

// تنفيذ الطلب
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'حدث خطأ في الخادم الخارجي']);
    exit;
}

// إرجاع الرد للعميل
echo $response;
