## Пособие по установке проекта

1. ПО которое должно быть установлено:
   - docker
   - docker-compose
2. Скачиваем проект из репозитория. Копируем файл .env.example `cp .env.example .env`
3. В файлу `.env` меняем DB_HOST на DB_HOST=db, DB_DATABASE на DB_DATABASE=laravelForm, DB_PASSWORD на DB_PASSWORD=password
4. Начинаем собирать наши образы `docker-compose build`
5. Поднимаем контейнера `docket-compose up -d`
6. Заходим на виртуальную машину `docker exec -it laravel-app bash`
7. Выполняем стартувую установку зависимостей композера `composer install`
8. Делаем миграции всех таблиц `php artisan migrate`
9. Создаем роль админа `php artisan permission:create-role admin`
10. Включаем сиды для заполнения таблицы `countries` и создания аккаунта админа `php artisan db:seed`
    | Логин  | admin@admin.com |
    | ------ | --------------- |
    | Пароль | password        |
11. Включаем ссылку для хранилища фотографий `php artisan storage:link`
12. Устанавливаем ключ шифрования сессий и кук `php arisan key:generate`


## Endpoints
|endpoint         |value                       |
|-----------------|----------------------------|
| ' / '           |Главная страница с формой   |
|' /admin_panel ' |Админ панель                |
|' /listprofiles '|Страница со списком мемберов|

