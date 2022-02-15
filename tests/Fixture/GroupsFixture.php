<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupsFixture
 */
class GroupsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'city' => 'Lorem ipsum dolor sit amet',
                'wa_link' => 'Lorem ipsum dolor sit amet',
                'tel_link' => 'Lorem ipsum dolor sit amet',
                'is_approved' => 1,
                'created' => '2022-02-11 19:22:45',
                'modified' => '2022-02-11 19:22:45',
            ],
        ];
        parent::init();
    }
}
