<?php

// 接続
// hostはサービス名を記載する（推奨）
$dsn = 'mysql:dbname=test_db;host=run-php-db;';
$user = 'test';
$password = 'test';

try {
    $pdo = new PDO($dsn, $user, $password);
    // すべてのユーザーを取得（最新順）
    $sth = $pdo->query("SELECT * FROM users ORDER BY id DESC");
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);

    // HTMLで表示
    echo '<!DOCTYPE html>';
    echo '<html><head><meta charset="UTF-8"><title>Users List</title>';
    echo '<style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .count { margin-bottom: 10px; font-weight: bold; }
    </style></head><body>';

    echo '<h1>Users List</h1>';
    echo '<div class="count">Total: ' . count($users) . ' users</div>';

    if (count($users) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>First Name</th><th>Age</th></tr>';
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user['id']) . '</td>';
            echo '<td>' . htmlspecialchars($user['first_name']) . '</td>';
            echo '<td>' . htmlspecialchars($user['age']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No users found.</p>';
    }

    echo '</body></html>';
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    exit;
} 