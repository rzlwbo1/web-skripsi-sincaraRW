<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Category;
use App\Models\CategoryEvent;
use App\Models\Information;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            "name" => "Rizal Wibowo",
            "username" => "rizalbow",
            "email" => "admin@gmail.com",
            "password" => Hash::make('password')
        ]);
        
        User::factory()->count(3)->create();


        Category::create([
            "name" => "Acara",
            "slug" => 'acara'
        ]);

        Category::create([
            "name" => "Berita",
            "slug" => 'berita'
        ]);

        Category::create([
            "name" => "Informasi",
            "slug" => 'informasi'
        ]);


        CategoryEvent::create([
            "name" => "Undangan",
            "slug" => 'undangan'
        ]);

        CategoryEvent::create([
            "name" => "Formal",
            "slug" => 'formal'
        ]);

        CategoryEvent::create([
            "name" => "Non Formal",
            "slug" => 'non-formal'
        ]);

        Event::factory()->count(15)->create();

        Information::factory()->count(10)->create();

        // Event::create([
        //     "category_id" => 1,
        //     'user_id' => 1,
        //     'title' => "Pemilihan ketua RT",
        //     'slug' => Str::slug('Pemilihan ketua RT', '-'),
        //     'priority' => 1,
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure',
        //     "body" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure, quas quisquam provident ex! Sit, recusandae. Non expedita incidunt itaque amet earum odit libero, iusto impedit enim molestias eius porro magni sunt, nulla accusantium, voluptatem temporibus vero exercitationem dignissimos maiores soluta quis quisquam quae! Repudiandae eligendi aspernatur, laboriosam voluptas architecto molestias expedita quae fugiat sapiente voluptatem commodi dicta sunt eveniet neque quidem. Aperiam modi consequatur eaque dolorem labore molestias nam eius, perspiciatis quasi. Quis illo pariatur laudantium quidem autem consequatur.',
        //     'publish_at' => date("Y-m-d"),
        //     'time_at' => date('H:i:s')
        // ]);

        // Event::create([
        //     "category_id" => 3,
        //     'user_id' => 1,
        //     'title' => "Pembersihan Kantor RW",
        //     'slug' => Str::slug('Pembersihan Kantor RW', '-'),
        //     'priority' => 2,
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure',
        //     "body" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure, quas quisquam provident ex! Sit, recusandae. Non expedita incidunt itaque amet earum odit libero, iusto impedit enim molestias eius porro magni sunt, nulla accusantium, voluptatem temporibus vero exercitationem dignissimos maiores soluta quis quisquam quae! Repudiandae eligendi aspernatur, laboriosam voluptas architecto molestias expedita quae fugiat sapiente voluptatem commodi dicta sunt eveniet neque quidem. Aperiam modi consequatur eaque dolorem labore molestias nam eius, perspiciatis quasi. Quis illo pariatur laudantium quidem autem consequatur.',
        //     'publish_at' => date("Y-m-d"),
        //     'time_at' => date('H:i:s')
        // ]);

        // Event::create([
        //     "category_id" => 2,
        //     'user_id' => 2,
        //     'title' => "Gotong Royong warga",
        //     'slug' => Str::slug('Gotong Royong warga', '-'),
        //     'priority' => 2,
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure',
        //     "body" => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed aliquam excepturi suscipit sint corporis assumenda cumque ullam saepe, ea repellat neque, minima ducimus magni animi omnis culpa tempore inventore iure, quas quisquam provident ex! Sit, recusandae. Non expedita incidunt itaque amet earum odit libero, iusto impedit enim molestias eius porro magni sunt, nulla accusantium, voluptatem temporibus vero exercitationem dignissimos maiores soluta quis quisquam quae! Repudiandae eligendi aspernatur, laboriosam voluptas architecto molestias expedita quae fugiat sapiente voluptatem commodi dicta sunt eveniet neque quidem. Aperiam modi consequatur eaque dolorem labore molestias nam eius, perspiciatis quasi. Quis illo pariatur laudantium quidem autem consequatur.',
        //     'publish_at' => date("Y-m-d"),
        //     'time_at' => date('H:i:s')
        // ]);
    }
}
