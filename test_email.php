<?php
try {
    Mail::raw('Test email', function ($message) {
        $message->to('jorrel_95@hotmail.co.uk')->subject('Test');
    });
    echo "Email sent successfully.\n";
} catch (\Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
