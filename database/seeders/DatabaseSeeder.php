<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryD;
use App\Models\Destination;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed Destination Category Data
        CategoryD::create([
            'category_name' => 'Tanjungpinang City',
            'slug' => 'tanjungpinang-city'
        ]);
        CategoryD::create([
            'category_name' => 'Batam City',
            'slug' => 'batam-city'
        ]);
        CategoryD::create([
            'category_name' => 'Bintan Island',
            'slug' => 'bintan-island'
        ]);
        CategoryD::create([
            'category_name' => 'Karimun Island',
            'slug' => 'karimun-island'
        ]);
        CategoryD::create([
            'category_name' => 'Natuna Island',
            'slug' => 'natuna-island'
        ]);
        CategoryD::create([
            'category_name' => 'Lingga Island',
            'slug' => 'lingga-island'
        ]);
        CategoryD::create([
            'category_name' => 'Anambas Island',
            'slug' => 'anambas-island'
        ]);


        // Seed Post Category Data
        Category::create([
            'category_name' => 'Trending',
            'slug' => 'trending'
        ]);
        Category::create([
            'category_name' => 'Tour Tips',
            'slug' => 'tour-tips'
        ]);
        Category::create([
            'category_name' => 'Destination Info',
            'slug' => 'destination-info'
        ]);


        // Seed Post Data
        Post::create([
            'creator' => 'Kepri Escapes',
            'category_id' => '1',
            'post_title' => '11 Tour Destination in Riau Islands, One of them Features Thousands of Statues',
            'post_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => '11-tour-destination-in-riau-islands-one-of-them-features-thousands-of-statues',
            'post_picture' => 'assets/img/kelenteng-senggarang.jpg'
        ]);
        Post::create([
            'creator' => 'Kepri Escapes',
            'category_id' => '2',
            'post_title' => '5 Frugal Traveling Tips That We Must Apply When On Vacation',
            'post_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => '5-frugal-traveling-tips-that-we-must-apply-when-on-vacation',
            'post_picture' => 'assets/img/tips.jpg'
        ]);
        Post::create([
            'creator' => 'Kepri Escapes',
            'category_id' => '3',
            'post_title' => '7 Tourist Destinations in The Riau Islands That Make You Feel At Home',
            'post_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => '7-tourist-destinations-in-the-riau-islands-that-make-you-feel-at-home',
            'post_picture' => 'assets/img/pulau-ranoh.jpg'
        ]);


        // Seed Destination Data
        Destination::create([
            'package_name' => 'One Day Tour Lagoi Bay',
            'category_d_id' => '3',
            'package_price' => '1000',
            'time' => '1 Day 1 Night',
            'package_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => 'one-day-tour-lagoi-bay',
            'package_picture' => 'assets/img/bintan-lagoi-bay.jpg'
        ]);

        Destination::create([
            'package_name' => 'One Day Tour Batam,',
            'category_d_id' => '2',
            'package_price' => '250',
            'time' => '1 Day',
            'package_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => 'one-day-tour-batam',
            'package_picture' => 'assets/img/batam-city.jpg'
        ]); 

        Destination::create([
            'package_name' => 'One Day Tour Penyengat Island',
            'category_d_id' => '1',
            'package_price' => '250',
            'time' => '1 Day',
            'package_content' => '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget luctus orci. Nullam ullamcorper, neque quis ultricies fermentum, sem risus rutrum massa, eu vehicula dui ligula eu dui. In hac habitasse platea dictumst. Nullam tempor magna neque, id lobortis orci congue et. Suspendisse dapibus fermentum lorem. Praesent a sapien ut leo accumsan hendrerit sit amet ac turpis. Vivamus nibh erat, elementum at leo non, aliquam tincidunt metus. Cras at tincidunt tellus. Nullam ultrices posuere cursus. Vestibulum pellentesque sagittis congue. Sed eu dui lorem. Vivamus sed eros pulvinar tortor maximus aliquet. Vivamus sodales massa ac eros mollis ullamcorper et nec erat. Sed mollis nisl ac mauris finibus faucibus. Mauris tempor quam vitae vulputate aliquet.</div>
                               <div>Donec malesuada dapibus ex, vel faucibus diam accumsan in. Pellentesque porttitor metus et lorem ullamcorper ultricies. Suspendisse potenti. Suspendisse interdum justo sit amet sapien faucibus tincidunt. Vestibulum consectetur ornare enim. Proin efficitur sapien at mi porta, sed condimentum nisl vehicula. Aliquam erat volutpat. Donec fringilla ut libero hendrerit viverra. Fusce arcu nisi, elementum ut tellus id, cursus ornare magna. Nulla volutpat nunc nulla</div>',
            'slug' => 'one-day-tour-lagoi-bay',
            'package_picture' => 'assets/img/penyengat.jpg'
        ]);
    }
}
