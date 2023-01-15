<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use App\Models\Project;
use App\Models\User;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
         $table->ulid('id')->primary();
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->text('short_description');
            $table->text('biography')->nullable();
            $table->string('avatar')->default('default-avatar.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
         */

        $avatars = ['avatar-1.png', 'avatar-2.png', 'avatar-3.png', 'avatar-4.png', 'default-avatar.png'];
        $thumbnails = ['thumbnail-1.png', 'thumbnail-2.png', 'thumbnail-3.png', 'thumbnail-4.png'];
        $covers = ['project-cover-1.png', 'project-cover-2.png', 'project-cover-3.png', 'project-cover-4.png'];
        $news_covers = ['cover-1.png', 'cover-2.png', 'cover-3.png'];
        $users = [];

        $users[] = User::factory()->create([
            'username' => 'admin',
            'first_name' => '(admin voornaam)',
            'last_name' => '(admin achternaam)',
            'birthdate' => '1997-10-10',
            'short_description' => 'Admin acc',
            'biography' => 'Dit is mijn biografie',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'admin' => 1,
        ]);

        for($i = 0; $i < 20; $i++) {
            $users[] = User::factory()->create([
                'birthdate' => '1997-10-10',
                'short_description' => 'seed_acc'.$i,
                'biography' => 'Dit is mijn'.$i.'e biografie',
                'email' => 'test'. $i . '@ehb.be',
                'password' => Hash::make('Password!321'),
                'admin' => (($i % 2) == 0),
                'avatar' => $avatars[array_rand($avatars)]
            ]);
        }

        for($i = 0; $i < 1024; $i++) {
            Project::factory()->create([
                'user_id' => $users[array_rand($users)]->id,
                'thumbnail' => $thumbnails[array_rand($thumbnails)],
                'cover' => $covers[array_rand($covers)],
            ]);
        }

        for($i = 0; $i < 80; $i++) {
            News::factory()->create([
                'image' => $news_covers[array_rand($news_covers)],
            ]);
        }

    }
}
