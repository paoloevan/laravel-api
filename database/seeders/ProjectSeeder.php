<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->cover_image = 'https://picsum.photos/300/200';
            $project->team = $faker->word();
            $project->duration = $faker->randomDigit();
            $project->description = $faker->sentence(50);
            $project->project_url = $faker->domainName();
            $project->source_code = $faker->domainName();
            $project->slug_title = Project::generate_slug($project->title);
            $project->save();
        }
    }
}
