<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examples = [
            ['Candy Crush Soda Saga','Puzzle','https://www.king.com/game/candycrushsoda',false],
            ['Temple Run','Action','https://poki.com/en/g/temple-run-2',false],
            ['8 Ball Pool','Strategy','https://www.miniclip.com/games/8-ball-pool-multiplayer/en/#privacy-settings',false],
            ['Subway Surfers','Sports','https://poki.com/en/g/subway-surfers',false],
            ['Ludo Club - Fun Dice Game','Puzzles','https://poki.com/en/g/ludo-hero',false],
            ['PUBG','Action','https://poki.com/en/g/kart-wars',true],
            ['Hill Climb Racing','Sports','https://play.famobi.com/high-hills',false],
            ['Element Blocks','Strategy','https://html5games.com/Game/Element-Blocks/8c70b6c7-5792-4c40-b891-496eef2fb5ed',true],
            ['Fruit Ninja','Puzzles','https://poki.com/en/g/onet-fruit-classic',true],
            ['Solitaire Reverse','Strategy','https://poki.com/en/g/solitaire-reverse',false],
        ];

        foreach ($examples as [$title,$categoryName,$url,$vpn]) {
            $category = Category::firstOrCreate([
                'name' => $categoryName,
            ], [
                'slug' => str($categoryName)->slug(),
                'is_active' => true,
            ]);

            Game::firstOrCreate([
                'title' => $title,
                'url' => $url,
            ], [
                'category_id' => $category->id,
                'image' => null,
                'requires_vpn' => $vpn,
                'is_active' => true,
            ]);
        }
    }
}
