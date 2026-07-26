<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Fleetbase\Models\User;
use Fleetbase\Models\Setting;

class DevSetupSeeder extends Seeder
{
    public function run()
    {
        // Disable SMS verification
        Setting::updateOrCreate(['key' => 'sms_enabled'], ['value' => 'false']);
        
        echo "✓ SMS disabled\n";

        // Show existing users
        $users = User::all();
        if ($users->count() > 0) {
            echo "✓ Existing users (" . $users->count() . "):\n";
            foreach ($users as $user) {
                echo "  - {$user->email} ({$user->name})\n";
            }
        } else {
            echo "ℹ No users yet\n";
        }
    }
}