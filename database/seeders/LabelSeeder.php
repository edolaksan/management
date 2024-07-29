<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;
use App\Models\Category;

class LabelSeeder extends Seeder
{
    public function run()
    {
        // Contoh data
        $labels = [
            [
                'name' => 'Customer Type',
                'categories' => [
                    ['name' => 'VIP'],
                    ['name' => 'Regular'],
                ]
            ],
            [
                'name' => 'Goals',
                'categories' => [
                    ['name' => 'Increase Sales'],
                    ['name' => 'Improve Customer Satisfaction'],
                ]
            ]
        ];

        foreach ($labels as $labelData) {
            $label = Label::create(['name' => $labelData['name']]);
            foreach ($labelData['categories'] as $categoryData) {
                $label->categories()->create($categoryData);
            }
        }
    }
}
