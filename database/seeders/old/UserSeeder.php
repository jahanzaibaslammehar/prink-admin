<?php

namespace Database\Seeders;

use App\Models\AbuseReports;
use App\Models\Comments;
use App\Models\FavoriteMusic;
use App\Models\FavoriteVideos;
use App\Models\Followers;
use App\Models\Followings;
use App\Models\Likes;
use App\Models\Music;
use App\Models\Notifications;
use App\Models\User;
use App\Models\Profiles;
use App\Models\Unlikes;
use App\Models\Videos;
use App\Models\Views;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [
                'email' => 'alirazzaq88@gmail.com',
                'email_verified_at' => now(),
                'mobile' => '+923333529656',
                'mobile_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'is_active' => 1,
                'is_admin' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);

        \App\Models\Profiles::insert([
            [
                'user_id' => 1,
                'first_name' => 'Ali',
                'last_name' => 'Razzaq',
                'location_id' => 1,
                'gender_id' => 1,
                'body_shape_id' => 1,
                'dob' => '1988-03-03',
            ]
        ]);

        // Fake users
        AbuseReports::factory()->times(40)->create();
        Comments::factory()->times(45)->create();
        FavoriteMusic::factory()->times(22)->create();
        FavoriteVideos::factory()->times(18)->create();
        Followers::factory()->times(20)->create();
        Followings::factory()->times(30)->create();
        Likes::factory()->times(43)->create();
        Music::factory()->times(25)->create();
        Notifications::factory()->times(16)->create();
        Unlikes::factory()->times(14)->create();
        Videos::factory()->times(35)->create();
        Views::factory()->times(35)->create();
        
        Profiles::factory()->times(9)->create();
        User::factory()->times(9)->create();
    }
}
