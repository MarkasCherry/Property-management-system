<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleCategory;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    private $permissions = [
        'System' => [
            'Administrators' => [
                'Create administrators',
                'Edit administrators',
                'View administrators',
                'Delete administrators',
            ],
            'Properties' => [
                'Create properties',
                'Edit properties',
                'View properties',
                'Delete properties',
            ],
            'Rooms' => [
                'Create rooms',
                'Edit rooms',
                'View rooms',
                'Delete rooms',
            ],
            'Amenities' => [
                'Create amenities',
                'Edit amenities',
                'View amenities',
                'Delete amenities',
            ],
            'Settings' => [
                'Create settings',
                'Edit settings',
                'View settings',
                'Delete settings',
            ],
            'Notifications' => [
                'Create notifications',
                'Edit notifications',
                'View notifications',
                'Delete notifications',
            ],
            'Questions' => [
                'Create questions',
                'Edit questions',
                'View questions',
                'Delete questions',
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Spatie\Permission\Models\Role $rootRole */
        $rootRole = Role::firstOrCreate([
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);

        foreach ($this->permissions as $groupName => $group) {
            /** @var RoleCategory $groupModel */
            $groupModel = RoleCategory::firstOrCreate([
                'name' => $groupName
            ]);
            foreach ($group as $categoryName => $categories) {
                /** @var RoleCategory $category */
                $category = $groupModel->categories()->firstOrCreate([
                    'name' => $categoryName
                ]);

                foreach ($categories as $permission) {
                    $perm = $category->permissions()->firstOrCreate([
                        'name' => $permission,
                        'guard_name' => 'web'
                    ]);
                    $rootRole->givePermissionTo($perm);
                }
            }
        }
    }
}
