<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
        $channel2 = ['title' => 'VueJs', 'slug' => str_slug('VueJs')];
        $channel3 = ['title' => 'CSS3', 'slug' => str_slug('CSS3')];
        $channel4 = ['title' => 'JavaScript', 'slug' => str_slug('JavaScript')];
        $channel5 = ['title' => 'HTML5', 'slug' => str_slug('HTML5')];
        $channel6 = ['title' => 'PHP testing', 'slug' => str_slug('PHP testing')];
        $channel7 = ['title' => 'Spark', 'slug' => str_slug('Spark')];
        $channel8 = ['title' => 'Lumen', 'slug' => str_slug('Lumen')];
        $channel9 = ['title' => 'Forge', 'slug' => str_slug('Forge')];

        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        App\Channel::create($channel8);
        App\Channel::create($channel9);
    }
}
