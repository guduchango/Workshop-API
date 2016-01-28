<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Post;

class SaveUserPosts extends TestCase
{
    use WithoutMiddleware;
    use Dingo\Api\Routing\Helpers;

    public function test_its_user_post_save()
    {

        $user = factory(User::class,1)->make();
        $posts = factory(Post::class,5)->make();

        $postsArray=[];
        foreach($posts as $var)
        {
            $array = [
                'type' => 'posts',
                'id' => 1,
                'attributes' => $var['attributes']
            ];

            $postsArray[] = $array;
        }

          $array = [
                'data' => [
                    'type' => 'users',
                    'attributes' => $user->toArray(),
                ],
                'included' => $postsArray
            ];

            $dispatcher = app('Dingo\Api\Dispatcher');

            $response = $dispatcher->with($array)->post('users');

            print_r($response);
            exit();

            //$this->asserJson($response);

            /*$this->post('localhost:8000/api/users',$array)
                 ->seeJson([
                     'status' => 'success',
                 ]);*/

    }
}
