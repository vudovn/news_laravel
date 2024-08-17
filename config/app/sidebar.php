<?php 

return [
    [ 
        "title"=> "QL  Thành viên",
        "icon" => "<i class='bi bi-person'></i>",
        "menu" => [
           [
                'title' => 'Tất cả thành viên',
                'route' => 'admin.user',
           ], 
           [
                'title'=> 'Thêm thành viên',
                'route'=> 'admin.user.create',
           ]
            
        ]
     ], 
     [
          "title"=> "QL danh mục",
          "icon" => "<i class='bi bi-list'></i>",
          "menu" => [
               [
                    'title' => 'Tất cả danh mục',
                    'route' => 'admin.category',
               ], 
               [
                    'title'=> 'Thêm danh mục',
                    'route'=> 'admin.category.create',
               ]
          
          ]
     ],
     [
          "title"=> "QL bài viết",
          "icon" => "<i class='bi bi-list'></i>",
          "menu" => [
               [
                    'title' => 'Tất cả bài viết',
                    'route' => 'admin.post',
               ], 
               [
                    'title'=> 'Thêm bài viết',
                    'route'=> 'admin.post.create',
               ]
               , 
               [
                    'title'=> 'Bài viết của tôi',
                    'route'=> 'admin.post.my',
               ]
          
          ]
     ],
     [
          "title"=> "QL vai trò",
          "icon" => "<i class='bi bi-list'></i>",
          "menu" => [
               [
                    'title' => 'Tất cả vai trò',
                    'route' => 'admin.role',
               ], 
               [
                    'title'=> 'Thêm vai trò',
                    'route'=> 'admin.role.create',
               ]
          
          ]
     ],
];