<?php
$admin = \App\Admin::first();
if ($admin) {
    $admin->name = 'mohammed ishan';
    $admin->email = 'mohammedishu9251@gmail.com';
    $admin->password = bcrypt('admin123');
    $admin->save();
    echo "Admin updated.\n";
}

$settings = \App\SiteSetting::first();
if ($settings) {
    $settings->site_phone_primary = '9251398786';
    $settings->mail_to_address = 'mohammedishu9251@gmail.com';
    $settings->mail_from_address = 'mohammedishu9251@gmail.com';
    $settings->save();
    echo "Settings updated.\n";
}
