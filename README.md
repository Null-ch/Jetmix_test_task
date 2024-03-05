<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center"><img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/a1bd0bb1-25ce-4fed-bef3-8db48af30605" width="400" height="148"></p>

## Описание
Пример реализации тестового задания на позицию Laravel разработчика в компанию Jetmix.

## Задание
<details>
<summary> Содержание тестового задания </summary>
<img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/23ea1ced-20b1-4cf4-9a14-7f41537cf2d2">
</details>

## Установка
 - Клонировать репозиторий: `git clone https://github.com/Null-ch/Jetmix_test_task.git`
 - Запустить сборку и запуск контейнеров: `docker-compose up --build`
 - Выполнить вход в контейнер с проектом: `docker exec -it jetmix_test_task_app bash`
 - Обновить зависимости: `composer update`
 - Выполнить миграции: `php artisan migrate`
 - Заполнить БД первоначальными записями (создание пользователей): `php artisan db:seed`
#### Для мониторинга и пользования PGAdmin необходимо:
 - Авторизироваться по адресу: `http://localhost:5050/`
   <br>
   *Логин: admin@jetmix.com
   <br>
   *Пароль: root
   <br>
 - Создать новое подключение (register server) с данными из docker-compose.yml
   <br>
   *DB_HOST: db
   <br>
   *DB_PORT: 5432
   <br>
   *DB_DATABASE: jetmix_test_task
   <br>
   *DB_USERNAME: jetmix-admin
   <br>
   *DB_PASSWORD: root
   <br>
