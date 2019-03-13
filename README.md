# MovieCollection

Laravel framework kullanılarak geliştirilmiş basit bir film koleksiyon uygulamasıdır. Koleksiyona film ekleme, eklenen filmi düzenleme ve filtreleme gibi özelliklerin yanında filmlere eklenecek türlerin, oyuncu bilgilerinin de sisteme kayıt edileceği arayüzler bulunmaktadır.

**Sunucu Gereksinimleri:**

-   PHP >= 7.1.3
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension
-   BCMath PHP Extension

 **Ön Hazırlık:**
 
Kurulumdan önce, sistemin düzgün çalışabilmesi için MySQL veritabanının oluşturulması ve bilgilerin Laravel tarafındaki konfigürasyon dosyasına eklenmesi gerekmektedir.

1. PhpMyAdmin arayüzü veya farklı araçlar ile bir veritabanı ve veritabanı kullanıcısı oluşturulmalıdır.

2. Proje ana dizininde DB klasöründe bulunan SQL dökümü PhpMyAdmin veya benzer araçlar yardımıyla oluşturulan veritabanına yüklenmelidir. Bu işlem PhpMyAdmin arayüzünde "içe aktarma" olarak isimlendirilmiştir.

3. İçe aktarma işleminden sonra, ana dizindeki `.env.example` isimli dosyada veritabanı bilgileri düzenlenip, `.env` olarak kaydedilmelidir.

>     DB_CONNECTION=mysql
>     DB_HOST=127.0.0.1
>     DB_PORT=3306
>     DB_DATABASE=dbname
>     DB_USERNAME=dbuser
>     DB_PASSWORD=dbpass

**Kurulum:**

Ana dizindeki tüm dosyalar sunucudaki `public_html` dizinine aktarılmalı. Eğer subdomain kullanılıyorsa veya sunucuda birden fazla site barındırılıyorsa duruma göre alt dizinlere aktarılması gerekebilir.

Proje dosyaları sunucuya yüklendikten sonra, `config/app.php` dosyası açılıp, aşağıdaki satır düzenlenmelidir. `localhost` yerine domain adresi yazılmalıdır.

    'url' => env('APP_URL', 'http://localhost'),

Bu işlemlerden sonra domain adresi ile veya local'de çalışılıyorsa `localhost` ile site ana sayfasına ulaşılabilir.

**Ek Bilgiler:**

İçerikleri görebilmek ve içerik ekleyebilmek için kullanıcı girişi yapılması gerekmektedir. Demo amaçlı veritabanındaki iki farklı kullanıcı bulunmaktadır. User kullanıcısı içerikleri görüntüleyebilir ve ekleyebilir. Fakat düzenleme ve silme işlemi yapamaz. Admin kullanıcısı sistem üzerinde tüm işlemleri gerçekleştirme yetkisine sahiptir.

    admin@admin.com - admin123
    user@user.com - user1234

Kullanıcılar database seeder aracılığıyla test amaçlı oluşturulmuştur. Seed işlemi her çalıştırıldığında `Users` ve `Roles` tabloları temizlenmektedir. Seed işlemi aşağıdaki komut ile çalıştırılabilir.

    php artisan db:seed

Test amaçlı daha fazla veri eklemek istenirse `UsersTableSeeder.php` ve `RolesTableSeeder.php` dosyaları düzenlenebilir.
