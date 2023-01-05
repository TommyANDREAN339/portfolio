<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Part;
use App\Models\Post;
use App\Models\Unit;
use App\Models\User;
use App\Models\Leape;
use App\Models\Leave;
use App\Models\Branch;
use App\Models\Pattern;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Provider;
use App\Models\Provider2;
use App\Models\Organisation;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'username' => 'tommyandrean123',
            'name' => 'tommy andrean',
            'email' => 'tommyandrean99@gmail.com',
            'password' => bcrypt(1234567890)
        ]);

        User::create([
            'username' => 'thomasandrean098',
            'name' => 'tomma andrean',
            'email' => 'tommy1andrean999@gmail.com',
            'password' => bcrypt(21234567890)
        ]);

        User::create([
            'username' => 'tommiandrean',
            'name' => 'tommos andrean',
            'email' => 'tommy12andrean999@gmail.com',
            'password' => bcrypt(212345676890)
        ]);

        City::create([
            'name' => 'jakarta',
            'slug' => 'jakarta'  
        ]);

        City::create([
            'name' => 'jogja',
            'slug' => 'jogja'  
        ]);

        City::create([
            'name' => 'bandung',
            'slug' => 'bandung'  
        ]);

        Category::create([
            'name' => 'sony ericsson',
            'slug' => 'sony-ericsson'  
        ]);

        Category::create([
            'name' => 'samsung galaxy',
            'slug' => 'samsung-galaxy'  
        ]);

        Category::create([
            'name' => 'nokia smartphone',
            'slug' => 'nokia-smartphone'  
        ]);

        Post::create([
            'category_id' => 1,
            'user_id' => 1,
            'city_id' => 1,
            'provider2_id' => 1,
            'title' => 'tommy andrean',
            'slug'=> 'tommy-andrean',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
            veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
            eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
            beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
            Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
            odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
            assumenda earum mollitia ex corrupti. Eius laboriosam 
            accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
        ]);
         
        Post::create([
            'category_id' => 2,
            'user_id' => 2,
            'city_id' => 2,
            'provider2_id' => 2,
            'title' => 'tomma andrean',
            'slug'=> 'tomma-andrean',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
            veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
            eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
            beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
            Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
            odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
            assumenda earum mollitia ex corrupti. Eius laboriosam 
            accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
        ]);
        
        Post::create([
            'category_id' => 3,
            'user_id' => 3,
            'city_id' => 3,
            'provider2_id' => 3,
            'title' => 'tomme andrean',
            'slug'=> 'tomme-andrean',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
            veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
            eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
            beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
            Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
            odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
            assumenda earum mollitia ex corrupti. Eius laboriosam 
            accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
        ]);

        Post::create([
            'category_id' => 1,
            'user_id' => 3,
            'city_id' => 1,
            'provider2_id' => 1,
            'title' => 'tommes andrean',
            'slug'=> 'tommes-andrean',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
            veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
            eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
            beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
            Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
            odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
            assumenda earum mollitia ex corrupti. Eius laboriosam 
            accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
        ]);

        Post::create([
            'category_id' => 3,
            'user_id' => 2,
            'city_id' => 3,
            'provider2_id' => 3,
            'title' => 'tommeo andrean',
            'slug'=> 'tommeo-andrean',
            'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
            amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
            veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
            eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
            beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
            Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
            odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
            assumenda earum mollitia ex corrupti. Eius laboriosam 
            accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
        ]);

       Part::create([
           'organisation_id' => 1,
           'branch_id' => 1,
           'title' => 'tommy andrean',
           'slug' => 'tommy-andrean',
           'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
           amet itaque',
           'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
           amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
           veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
           eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
           beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
           Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
           odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
           assumenda earum mollitia ex corrupti. Eius laboriosam 
           accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
       ]); 

       Part::create([
        'organisation_id' => 2,
        'branch_id' => 2,
        'title' => 'thomas andrean',
        'slug' => 'thomas-andrean',
        'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque',
        'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
        veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
        eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
        beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
        Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
        odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
        assumenda earum mollitia ex corrupti. Eius laboriosam 
        accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
    ]); 
    
    Part::create([
        'organisation_id' => 3,
        'branch_id' => 3,
        'title' => 'roro andrean',
        'slug' => 'roro-andrean',
        'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque',
        'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
        veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
        eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
        beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
        Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
        odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
        assumenda earum mollitia ex corrupti. Eius laboriosam 
        accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
    ]); 

    Organisation::create([
      'name' => 'Badan Permusyawaratan Desa',
      'slug' => 'Badan-Permusyawaratan-Desa'
    ]);   
    
    Organisation::create([
        'name' => 'Karang Taruna',
        'slug' => 'Karang-Taruna'
      ]);  

      Organisation::create([
        'name' => 'Kelompok Sadar Wisata',
        'slug' => 'Kelompok-Sadar-Wisata'
      ]); 
      
      Branch::create([
        'name' => 'CGK',
        'slug' => 'CGK'
      ]);

      Branch::create([
        'name' => 'PKY',
        'slug' => 'PKY'
      ]);

      Branch::create([
        'name' => 'BTJ',
        'slug' => 'BTJ'
      ]);

      Unit::create([
        'name' => 'Pemasaran',
        'slug' => 'Pemasaran'
      ]);

      Unit::create([
        'name' => 'Auditor',
        'slug' => 'Auditor'
      ]);

      Unit::create([
        'name' => 'Pengembang',
        'slug' => 'Pengembang'
      ]);

      Position::create([
        'name' => 'Direktur',
        'slug' => 'Direktur'
      ]);
      
      Position::create([
        'name' => 'Manajer',
        'slug' => 'Manajer'
      ]);
      
      Position::create([
        'name' => 'Karyawan',
        'slug' => 'Karyawan'
      ]);
     
      Pattern::create([
        'city_id' => 1,
        'organisation_id' => 1,
        'unit_id' => 1,
        'position_id' => 1,
        'title' => 'tommeon andrean',
        'slug'=> 'tommeon-andrean',
        'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque',
        'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
        veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
        eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
        beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
        Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
        odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
        assumenda earum mollitia ex corrupti. Eius laboriosam 
        accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
    ]);

    Pattern::create([
        'city_id' => 2,
        'organisation_id' => 2,
        'unit_id' => 2,
        'position_id' => 2,
        'title' => 'tommeop andrean',
        'slug'=> 'tommeop-andrean',
        'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque',
        'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
        veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
        eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
        beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
        Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
        odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
        assumenda earum mollitia ex corrupti. Eius laboriosam 
        accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
    ]);

    Pattern::create([
        'city_id' => 3,
        'organisation_id' =>3,
        'unit_id' =>3,
        'position_id' =>3,
        'title' => 'tommeow andrean',
        'slug'=> 'tommeow-andrean',
        'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque',
        'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
        amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
        veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
        eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
        beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
        Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
        odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
        assumenda earum mollitia ex corrupti. Eius laboriosam 
        accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inventore eligendi quidem.'
    ]);

    Employee::create([
      'provider_id' => 1,
      'branch_id' => 1,
      'user_id' => 1,
      'title' => 'lukas andre ',
      'slug' => 'lukas-andre ',
      'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
       amet itaque',
       'NIP' => 111111,
       'NIK' => 1111112,
      'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
      amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
      veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
      eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
      beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
      Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
      odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
      assumenda earum mollitia ex corrupti. Eius laboriosam 
      accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inven'  
    ]);
    
    Employee::create([
      'provider_id' => 2,
      'branch_id' => 2,
      'user_id' => 2,
      'title' => 'lukaso andre ',
      'slug' => 'lukaso-andre ',
      'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
       amet itaque',
       'NIP' => 222222,
       'NIK' => 222221,
      'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
      amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
      veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
      eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
      beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
      Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
      odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
      assumenda earum mollitia ex corrupti. Eius laboriosam 
      accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inven'  
    ]);

    Employee::create([
      'provider_id' => 3,
      'branch_id' => 3,
      'user_id' => 3,
      'title' => 'lukasi andre ',
      'slug' => 'lukasi-andre ',
      'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
       amet itaque',
       'NIP' => 333333,
       'NIK' => 3333331,
      'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, ea alias veniam sint
      amet itaque voluptatibus odit ipsam tenetur praesentium architecto, laborum eaque 
      veritatis adipisci ratione harum fugiat repudiandae nesciunt quisquam dicta voluptatum 
      eos eligendi animi sequi. Saepe fuga atque molestiae eaque libero nam fugit. Praesentium 
      beatae unde error minima suscipit aliquam quos, eaque qui, cumque hic laboriosam repellendus!
      Incidunt eaque itaque blanditiis, minus eum, nisi soluta maxime excepturi iusto veritatis 
      odit nostrum ipsa suscipit ducimus perspiciatis id adipisci rerum architecto odio molestias
      assumenda earum mollitia ex corrupti. Eius laboriosam 
      accusamus perferendis dolorem! Debitis fuga, explicabo doloribus inven'  
    ]);

    Provider::create([
      'name' => 'APA',
      'slug' => 'APA'
    ]);

    Provider::create([
      'name' => 'KSA',
      'slug' => 'KSA'
    ]);
    Provider::create([
      'name' => 'KSAS',
      'slug' => 'KSAS'
    ]);

    Provider2::create([
      'name' => 'APSP',
      'slug' => 'APSP'
    ]); 
    Provider2::create([
      'name' => 'APSS',
      'slug' => 'APSS'
    ]); 
    Provider2::create([
      'name' => 'APAS',
      'slug' => 'APAS'
    ]); 

    Leave::create([
      'user_id' => 1,
      'leape_id' => 1,
       'title' => 'mohon izin',
       'slug' => 'mohon-izin'
    ]);

    Leave::create([
      'user_id' => 2,
      'leape_id' => 2,
       'title' => 'mohon maaf',
       'slug' => 'mohon-maaf'
    ]);

    Leave::create([
      'user_id' => 3,
      'leape_id' => 3,
       'title' => 'saya ada urusan ',
       'slug' => 'saya-ada-urusan'
    ]);

    Leape::create([
       'name' => 'sakit',
       'slug' => 'sakit'
    ]);

    Leape::create([
       'name' => 'cuti',
       'slug' => 'cuti'
    ]);

    Leape::create([
       'name' => 'izin',
       'slug' => 'izin'
    ]);


    }
}
