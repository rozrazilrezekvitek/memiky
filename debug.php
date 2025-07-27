<?php
define('DEBUG_MODE',false);
$debug_messages = [];
if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

if (!empty($debug_messages)) {
    echo '<div class="debug-container">';
    foreach ($debug_messages as $msg) {
        echo '<div class="debug">' . htmlspecialchars($msg) . '</div>';
    }
    echo '</div>';
}

function debug($msg)
{
    if (DEBUG_MODE) {
        global $debug_messages;
        $debug_messages[] = $msg;
    }
}

// Register a shutdown function to render messages at the end
register_shutdown_function(function () {
    global $debug_messages;

    if (!empty($debug_messages)) {
        echo '<div class="debug-container">';
        foreach ($debug_messages as $msg) {
            echo '<div class="debug">' . htmlspecialchars($msg) . '</div>';
        }
        echo '</div>';
    }
});
