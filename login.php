<?php
$databaseUrl = "postgresql://neondb_owner:npg_Vg3GpH1xJbEa@ep-soft-hat-ae4ogidj-pooler.c-2.us-east-2.aws.neon.tech/neondb?channel_binding=require&sslmode=require";

$parts = parse_url($databaseUrl);

$user = $parts['user'];
$pass = $parts['pass'];
$host = $parts['host'];
$port = $parts['port'] ?? 5432; // porta di default Postgres
$dbname = ltrim($parts['path'], '/');

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Errore connessione DB: " . $e->getMessage());
}
