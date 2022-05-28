<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Contract;
use App\Models\Corporation;
use App\Models\CorporationDocument;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Corporation::factory(10)->create();
        Company::factory(10)->create();
        Document::factory(10)->create();
        Contract::factory(10)->create();
        Contact::factory(10)->create();
        CorporationDocument::factory(10)->create();
    }
}
