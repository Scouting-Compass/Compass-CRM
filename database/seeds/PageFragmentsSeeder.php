<?php

use ActivismeBe\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Class PageFragmentsSeeder
 */
class PageFragmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Page::create(['slug' => 'privacy-policy', 'title' => 'Privacy Policy', 'content' => 'Privacy Policy description']);
    }
}
