<?php
class Logger {
    private static $logs = [];

    public static function log($userType, $username, $action) {
        $logEntry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'user_type' => $userType,
            'username' => $username,
            'action' => $action
        ];
        array_unshift(self::$logs, $logEntry);
    }

    public static function getLogs() {
        return self::$logs;
    }
}

class User {
    protected $username;

    public function __construct($username) {
        $this->username = $username;
    }

    public function uploadMessage($message) {
        Logger::log('User', $this->username, "Mengunggah pesan: $message");
        return "Pesan '$message' berhasil diunggah";
    }

    public function getUsername() {
        return $this->username;
    }
}

class Moderator extends User {
    public function deleteMessage($messageId) {
        Logger::log('Moderator', $this->username, "Menghapus pesan ID: $messageId");
        return "Pesan ID $messageId berhasil dihapus";
    }
}

class Admin extends Moderator {
    public function pinMessage($messageId) {
        Logger::log('Admin', $this->username, "Menyematkan pesan ID: $messageId");
        return "Pesan ID $messageId berhasil disematkan";
    }
}

// Example usage
$user = new User('user1');
echo $user->uploadMessage("Hello world!") . "\n";

$moderator = new Moderator('mod1');
echo $moderator->uploadMessage("Moderator message") . "\n";
echo $moderator->deleteMessage(123) . "\n";

$admin = new Admin('admin1');
echo $admin->uploadMessage("Important notice") . "\n";
echo $admin->deleteMessage(456) . "\n";
echo $admin->pinMessage(789) . "\n";

// Display logs
echo "\nLog Aktivitas:\n";
foreach (Logger::getLogs() as $log) {
    echo "[{$log['timestamp']}] {$log['user_type']} {$log['username']} - {$log['action']}\n";
}
?>