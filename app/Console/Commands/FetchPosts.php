<?php

namespace App\Console\Commands;

use App\Data\Post;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch old posts from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $client = new Client();
            $data = $client->get('https://sq1-api-test.herokuapp.com/posts');
            $data = json_decode($data->getBody()->getContents());
            $admin_user = User::whereHas('user_type',function ($q){
                $q->where('key','admin');
            })->first();
            collect($data->data)->each(function ($post) use ($admin_user) {
                Post::updateOrCreate([
                    'user_id' => $admin_user->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'publication_date' => $post->publication_date
                ]);
            });
        }catch (ClientException $e){
            Log::error($e);
        }
    }
}
