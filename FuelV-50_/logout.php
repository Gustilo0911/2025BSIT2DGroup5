<?php require_once __DIR__ . '/includes/auth.php'; ensureSessionStarted(); logoutUser(); header('Location: index.php'); exit; ?>

