<?php
/**
 * User: phuon
 * Date: 3/4/2021 10:42 PM
 */

return [
    'admin' => [
        'top' => [
            [
                'name'  => 'Từ khoá',
                'route' => 'get_backend.keyword.index'
            ],
            [
                'name'  => 'Danh mục',
                'route' => 'get_backend.category.index'
            ],
            [
                'name'  => 'Sản phẩm',
                'route' => 'get_backend.product.index'
            ],
            [
                'name'  => 'Tag',
                'route' => 'get_backend.tag.index'
            ],
            [
                'name'  => 'Menu',
                'route' => 'get_backend.menu.index'
            ],
            [
                'name'  => 'Slide',
                'route' => 'get_backend.slide.index'
            ],
            [
                'name'  => 'Bài viết',
                'route' => 'get_backend.article.index'
            ],
            [
                'name'  => 'Đơn hàng',
                'route' => 'get_backend.transaction.index'
            ],
            [
                'name'  => 'Người dùng',
                'route' => 'get_backend.user.index'
            ]
        ]
    ],
    'user' => [
        [

            'name' => 'Tổng quan',
            'route' => 'get_user.home',
            'icon' => 'fa-th-large'
        ]
    ]
];
