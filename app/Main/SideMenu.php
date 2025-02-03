<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Dashboard'
            ],
            'users' => [
                'icon' => 'users',
                'route_name' => 'app-users.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'App Users'
            ],
            'videos' => [
                'icon' => 'video',
                'route_name' => 'videos.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'All Videos'
            ],
            'abuse-report' => [
                'icon' => 'alert-octagon',
                'title' => 'Abuse Reports',
                'sub_menu' => [
                    'abuse-report-open' => [
                        'icon' => '',
                        'route_name' => 'abuse-reports.index',
                        'params' => [
                            'type' => 'open',
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Opened'
                    ],
                    'abuse-report-closed' => [
                        'icon' => '',
                        'route_name' => 'abuse-reports.index',
                        'params' => [
                            'type' => 'closed',
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Closed'
                    ],
                ]
            ],
            'help-center' => [
                'icon' => 'help-circle',
                'title' => 'Help Center',
                'route_name' => 'help-center.index',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Help Center'
            ],
            'subscriptions' => [
                'icon' => 'mail',
                'title' => 'subscriptions',
                'route_name' => 'subscriptions.index',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Subscriptions'
            ],
            'devider',
            'CRUD' => [
                'icon' => 'edit',
                'title' => 'CRUD',
                'sub_menu' => [
                    'body-shape-types' => [
                        'icon' => '',
                        'route_name' => 'body-types.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Body Shape Types'
                    ],
                    'colors' => [
                        'icon' => '',
                        'route_name' => 'colors.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Colors'
                    ],
                    'genders' => [
                        'icon' => '',
                        'route_name' => 'genders.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Genders'
                    ],
                    'hashtags' => [
                        'icon' => '',
                        'route_name' => 'hashtags.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Hashtags'
                    ],
                    'locations' => [
                        'icon' => '',
                        'route_name' => 'locations.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Locations'
                    ],
                    'music-categories' => [
                        'icon' => '',
                        'route_name' => 'music-category.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Music Categories'
                    ],
                    'video-categories' => [
                        'icon' => '',
                        'route_name' => 'video-category.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Video Categories'
                    ],
                    'outfit-types' => [
                        'icon' => '',
                        'route_name' => 'outfit-types.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Outfit Types'
                    ]
                ]
            ],
            'system-users' => [
                'icon' => 'lock',
                'route_name' => 'system-users.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'System Users'
            ],
            /*
            'settings' => [
                'icon' => 'settings',
                'route_name' => 'settings',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Settings'
            ],
            */
        ];
    }
}
