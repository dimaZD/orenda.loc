<?php

use App\Flat;
use Illuminate\Database\Seeder;

class FlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flat::insert(
            [
                [
                    'name' => 'Квартира 1',
                    'image' => 'default.png',
                    'advantages' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'seats' => '3',
                    'description' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'map' => 'вулиця Гулака-Артемовського 40, Луцьк, Волинська область, Україна',
                    'lat' => '50.7591775000',
                    'lng' => '25.3470937000',
                    'user_id' => '1',
                ],
                [
                    'name' => 'Квартира 2',
                    'image' => 'default.png',
                    'advantages' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'seats' => '4',
                    'description' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'map' => 'вулиця Гулака-Артемовського 40, Луцьк, Волинська область, Україна',
                    'lat' => '50.7591775000',
                    'lng' => '25.3470937000',
                    'user_id' => '1',
                ],
                [
                    'name' => 'Квартира 3',
                    'image' => 'default.png',
                    'advantages' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'seats' => '5',
                    'description' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'map' => 'вулиця Гулака-Артемовського 40, Луцьк, Волинська область, Україна',
                    'lat' => '50.7591775000',
                    'lng' => '25.3470937000',
                    'user_id' => '2',
                ],
                [
                    'name' => 'Квартира 4',
                    'image' => 'default.png',
                    'advantages' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'seats' => '6',
                    'description' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Curabitur aliquet quam id dui posuere blandit.',
                    'map' => 'вулиця Гулака-Артемовського 40, Луцьк, Волинська область, Україна',
                    'lat' => '50.7591775000',
                    'lng' => '25.3470937000',
                    'user_id' => '2',
                ],
            ]
        );
    }
}
