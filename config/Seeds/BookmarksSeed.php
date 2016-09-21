<?php
use Migrations\AbstractSeed;

/**
 * Bookmarks seed.
 */
class BookmarksSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id' => 2, 'twit' => 'seeding', 'description' => 'dddd', 'url' => 'uuu', 'created' => '2016-09-19 4:15:12']
        ];

        $table = $this->table('bookmarks');
        $table->insert($data)->save();
    }
}
