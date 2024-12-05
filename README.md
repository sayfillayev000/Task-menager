# Laravel asosida qurilgan Task Manager

Bu **Task Manager** ilovasi Laravel frameworkida yaratilgan. Foydalanuvchilar bir-birlariga topshiriq berishlari, topshiriqlarni boshqarishlari va admin panel orqali umumiy ma'lumotlarni ko‘rishlari mumkin. 

## Xususiyatlari

-   Topshiriqlarni CRUD (Create, Read, Update, Delete) orqali boshqarish.
-   Admin panel orqali umumiy harakatlarni ko‘rib chiqish.

---

## O‘rnatish bo‘yicha yo‘riqnoma

Loyihani o‘rnatish va ishga tushirish uchun quyidagi bosqichlarni bajaring:

### 1. Repozitoriyani klonlash

```bash
git clone git remote add origin https://github.com/sayfillayev000/Task-menager.git
cd Task-Manager
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
npm install
npm run dev
```


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_menager
DB_USERNAME=root
DB_PASSWORD=

```bash
php artisan migrate --seed
php artisan serve

```

Admin ma'lumotlari: Dastlabki admin hisob ma'lumotlari:

Email: avezovelyor@gmail.com
Parol: password


O'quvchi ma'lumotlari:
Email => worker@gmail.com
password => password
