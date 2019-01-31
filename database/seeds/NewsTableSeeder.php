<?php

use Illuminate\Database\Seeder;
use App\News;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
        	'title' => 'Enim qui quod',
        	'description' => 'Voluptatem molestias ab voluptatem dicta provident dicta doloremque impedit. Voluptatem quo nostrum dolorem esse. Officiis est magnam provident optio et. Dolor possimus minima sunt consequatur. Eligendi ipsum doloribus illo fuga qui itaque vitae. Recusandae animi velit sunt laborum quo. Consequatur fugiat et repudiandae tempore quod.',

        	'content' => 'Omnis doloremque aperiam quisquam tempore. Id qui voluptas neque illo. Totam quas et facere. Aut mollitia et vel debitis. Temporibus est quidem enim rerum et debitis quae. Doloremque doloribus ullam ea ratione. Sapiente quam itaque odit esse. Dolorem aperiam sunt deleniti a. Omnis facere voluptate tempora ea temporibus. Doloremque veritatis consequatur ex a. Expedita rerum aspernatur ut dicta eos modi assumenda aut. Maxime dolor minima labore omnis. Et non ad possimus inventore qui aliquid. Non qui dolorem suscipit ea delectus. Quo quaerat est incidunt vel aperiam ut. Vero recusandae odio dolorem aut aut minima. Sed impedit nulla laboriosam qui eos sequi. Eos repellat eum illo dolores et est. Error reprehenderit tempore vero. Quo ut dolores minima praesentium nihil repellat architecto officiis. Sit voluptatibus qui eos occaecati non dolor nobis provident. Consequuntur quis eos aut aliquid. Omnis enim sit cupiditate cumque. Id est molestiae soluta quaerat aut. Sapiente quia labore quia dignissimos atque eveniet. Error molestiae cupiditate voluptatum qui rerum dolor. Nemo doloremque reiciendis dolor aut ea cumque. Aperiam quo adipisci dolorem nemo quae. Voluptatem eum libero qui omnis.',

        	'thumbnail' => 'https://lorempixel.com/400/480/?20596',
        	'author' => 'admin',
        ]);

        factory(News::class,10)->create();
    }
}
