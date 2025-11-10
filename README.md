1. composer install
2. php artisan key:generate
3. npm run dev
4. php artisan serve
5. php artisan migrate
6. php artisan config:clear
7. php artisan storage:link

#server instalasi
1. sebelum di upload di hosting
2. npm install
3. npm run build
4. Upload seluruh file project Laravel ke hosting, pastikan folder public/build dan seluruh isinya juga diupload ke dalam folder public_html/build (atau direktori public yang digunakan di server kamu).
5. Jika pada file .gitignore ada baris seperti /public/build, hapus atau sesuaikan agar folder build bisa ikut terupload.
6. jangan lupa cek permission folder public/build agar bisa diakses web server.
