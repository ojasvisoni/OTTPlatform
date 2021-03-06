<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('movies')->delete();
        
        \DB::table('movies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tmdb_id' => 335983,
                'title' => 'Venom',
                'slug' => 'venom',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '112',
                'thumbnail' => 'tmdb_2uNW4WbgBXL25BAbXGLnLqX71Sw.jpg',
                'poster' => 'poster_VuukZLgaCrho2Ar8Scl9HtV3yD.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '13,14,15,16,17',
                'actor_id' => '51,52,53,54,55',
                'genre_id' => '1,2',
                'trailer_url' => 'https://youtu.be/Worz_qCsYvU',
                'detail' => '{"en":"Investigative journalist Eddie Brock attempts a comeback following a scandal, but accidentally becomes the host of Venom, a violent, super powerful alien symbiote. Soon, he must rely on his newfound powers to protect the world from a shadowy organization looking for a symbiote of their own."}',
                'rating' => 6.8,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2018,
                'released' => '2018-09-28',
                'upload_video' => NULL,
                'featured' => 1,
                'series' => 0,
                'a_language' => '1',
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 0,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tmdb_id' => 637534,
                'title' => 'The Stronghold',
                'slug' => 'the-stronghold',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '105',
                'thumbnail' => 'tmdb_nLanxl7Xhfbd5s8FxPy8jWZw4rv.jpg',
                'poster' => 'poster_vkIJ2QgcKMJRvi6pBW4Tr2kgLdy.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '6',
                'actor_id' => '6,7,8,9,10',
                'genre_id' => '3,4',
                'trailer_url' => 'https://youtu.be/eB8KbeZaGx4',
                'detail' => '{"en":"A police brigade working in the dangerous northern neighborhoods of Marseille, where the level of crime is higher than anywhere else in France."}',
                'rating' => 7.7,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-08-18',
                'upload_video' => NULL,
                'featured' => 0,
                'series' => 0,
                'a_language' => NULL,
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 0,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tmdb_id' => 843241,
                'title' => 'The Seven Deadly Sins: Cursed by Light',
                'slug' => 'the-seven-deadly-sins-cursed-by-light',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '0',
                'thumbnail' => 'tmdb_k0ThmZQl5nHe4JefC2bXjqtgYp0.jpg',
                'poster' => 'poster_7h5WAPAcUzOWpp2jrwHBB48790j.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '18',
                'actor_id' => '56,57,58,59,60',
                'genre_id' => '5,2',
                'trailer_url' => 'https://youtu.be/ryRQCjV7TN8',
                'detail' => '{"en":"With the help of the \\"Dragon Sin of Wrath\\" Meliodas and the worst rebels in history, the Seven Deadly Sins, the \\"Holy War\\", in which four races, including Humans, Goddesses, Fairies and Giants fought against the Demons, is finally over. At the cost of the \\"Lion Sin of Pride\\" Escanor\'s life, the Demon King was defeated and the world regained peace. After that, each of the Sins take their own path."}',
                'rating' => 8.5,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-07-02',
                'upload_video' => NULL,
                'featured' => 1,
                'series' => 0,
                'a_language' => '1',
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 0,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'tmdb_id' => 451048,
                'title' => 'Jungle Cruise',
                'slug' => 'jungle-cruise',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '127',
                'thumbnail' => 'tmdb_9dKCd55IuTT5QRs989m9Qlb7d2B.jpg',
                'poster' => 'poster_7WJjFviFBffEJvkAms4uWwbcVUk.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '8',
                'actor_id' => '16,17,18,19,20',
                'genre_id' => '6,7,8,2',
                'trailer_url' => 'https://youtu.be/aYSy8guUUV0',
                'detail' => '{"en":"Dr. Lily Houghton enlists the aid of wisecracking skipper Frank Wolff to take her down the Amazon in his dilapidated boat. Together, they search for an ancient tree that holds the power to heal \\u2013 a discovery that will change the future of medicine."}',
                'rating' => 7.8,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-07-28',
                'upload_video' => NULL,
                'featured' => 0,
                'series' => 0,
                'a_language' => '1',
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 0,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'tmdb_id' => 576845,
                'title' => 'Last Night in Soho',
                'slug' => 'last-night-in-soho',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '117',
                'thumbnail' => 'tmdb_1qamhFbRGHicXz7hAzcsOnKVyFL.jpg',
                'poster' => 'poster_7OcRErUXXdAVAHg6y5cjn56ivtu.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '9,10,11',
                'actor_id' => '36,37,38,39,40',
                'genre_id' => '12,9,4,11',
                'trailer_url' => 'https://youtu.be/AcVnFrxjPjI',
                'detail' => '{"en":"A young girl, passionate about fashion design, is mysteriously able to enter the 1960s where she encounters her idol, a dazzling wannabe singer. But 1960s London is not what it seems, and time seems to be falling apart with shady consequences."}',
                'rating' => 7.8,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-10-21',
                'upload_video' => NULL,
                'featured' => 1,
                'series' => 0,
                'a_language' => '1',
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 1,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => '2021-10-29',
            ),
            5 => 
            array (
                'id' => 6,
                'tmdb_id' => 787723,
                'title' => '13 Minutes',
                'slug' => '13-minutes',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '108',
                'thumbnail' => 'tmdb_6IVRkhRno0Y6Zu63VI7THNMiMZG.jpg',
                'poster' => 'poster_i4sIFPDfPyBm1GYXMWnJTyFutcv.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '12',
                'actor_id' => '41,42,43,44,45',
                'genre_id' => '9,4',
                'trailer_url' => 'https://youtu.be/YiEFZLRyRQo',
                'detail' => '{"en":"As a new day begins in the small American town of Minninnewah, the residents start their day as ordinary as the next. Mother Nature, however, has other plans for them. Inhabitants have just 13 minutes to seek shelter before the largest tornado on record ravages the town, leaving them struggling to protect their loved ones and fighting for their lives. Left to deal with the aftermath, four families must overcome their differences and find strength in each other in order to survive."}',
                'rating' => 0.0,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-10-29',
                'upload_video' => NULL,
                'featured' => 0,
                'series' => 0,
                'a_language' => NULL,
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 1,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'tmdb_id' => 617653,
                'title' => 'The Last Duel',
                'slug' => 'the-last-duel',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '153',
                'thumbnail' => 'tmdb_zjrJE0fpzPvX8saJXj8VNfcjBoU.jpg',
                'poster' => 'poster_4BOgSGwEEHZuDhiHUOsrXaJBqoc.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '19',
                'actor_id' => '61,62,63,64,65',
                'genre_id' => '9,14,2',
                'trailer_url' => 'https://youtu.be/rPapNDpFoeY',
                'detail' => '{"en":"King Charles VI declares that Knight Jean de Carrouges settle his dispute with his squire by challenging him to a duel."}',
                'rating' => 7.7,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-10-13',
                'upload_video' => NULL,
                'featured' => 0,
                'series' => 0,
                'a_language' => NULL,
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 1,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => '2021-10-22',
            ),
            7 => 
            array (
                'id' => 8,
                'tmdb_id' => 542178,
                'title' => 'The French Dispatch',
                'slug' => 'the-french-dispatch',
                'keyword' => '{"en":null}',
                'description' => '{"en":null}',
                'duration' => '108',
                'thumbnail' => 'tmdb_6JXR3KJH5roiBCjWFt09xfgxHZc.jpg',
                'poster' => 'poster_zsmTFn1Y2ulNd2njTjDbIhYwmkx.jpg',
                'tmdb' => 'Y',
                'fetch_by' => 'title',
                'director_id' => '20,21',
                'actor_id' => '66,67,68,69,70',
                'genre_id' => '8,9,15',
                'trailer_url' => 'https://youtu.be/qrpbzEwPNyE',
                'detail' => '{"en":"The staff of a European publication decides to publish a memorial edition highlighting the three best stories from the last decade: an artist sentenced to life imprisonment, student riots, and a kidnapping resolved by a chef."}',
                'rating' => 0.0,
                'maturity_rating' => 'all age',
                'subtitle' => 0,
                'publish_year' => 2021,
                'released' => '2021-10-21',
                'upload_video' => NULL,
                'featured' => 1,
                'series' => 0,
                'a_language' => NULL,
                'audio_files' => NULL,
                'type' => 'M',
                'live' => 0,
                'livetvicon' => NULL,
                'status' => 1,
                'is_protect' => 0,
                'password' => NULL,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'is_upcoming' => 1,
                'is_custom_label' => 0,
                'label_id' => NULL,
                'upcoming_date' => NULL,
            ),
        ));
        
        
    }
}