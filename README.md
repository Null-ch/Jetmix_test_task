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

## Web
<h5><b>Описание</b></h5>
В проекте используется базовая регистрация, авторизация, восстановление пароля laravel/ui.<br>
Для после выполнения команды сидера создается учетная запись менеджера. Данные для входа на http://localhost:8076/ следующие:<br>

*Логин(email): <b> admin@jetmix.com </b> <br>
*Пароль: <b> pehExmJC4WqWDRn9 </b> <br>

Почта менеджера настраивается в .env, в поле MANAGER_EMAIL. Можно настроить перед созданием пользователя через сидер.<br>
<details>
<summary> Интерфейс менеджера</summary>
<img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/809dfd9f-9391-42d6-838e-f7bfabbf635c">
<img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/15803f91-5bf2-444c-b378-af657f527c5b">
</details>

<details>
<summary> Интерфейс пользователя</summary>
<img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/e7efbe0d-638b-4e35-84a1-705e912618fa">
</details>

В качестве почтового клиента для обработки писем использовался сервис app.debugmail.io. Для просмотра отправленных при создании обращений писем необходимо использовать свои данные debugmail<br>

MAIL_MAILER=smtp<br>
MAIL_HOST=app.debugmail.io<br>
MAIL_PORT=25<br>
MAIL_USERNAME=<br>
MAIL_PASSWORD=<br>
MAIL_ENCRYPTION=null<br>
MAIL_FROM_ADDRESS=john.doe@example.org<br>
MAIL_FROM_NAME="${APP_NAME}"<br>

## API
<h5><b>Описание</b></h5>
Перед началом работы необходимо авторизироваться от лица пользователя и создать обращения.<br>

<details>
<summary> Авторизация и получение токена </summary>
    -Роут: `http://localhost:8076/api/v1/login`<br>
    -Тип запроса: `POST`<br>
    -Данные для передачи в теле: email, password<br>
    <h5>Результат:</h5>
    <img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/04de488c-6a64-473f-bab7-bf25a84995c7">
</details>

<details>
<summary> Получение всех обращений </summary>
    -Роут: `http://localhost:8076/api/v1/appeal`<br>
    -Тип запроса: `GET`<br>
    <h5>Результат:</h5>
    <img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/88495304-d6be-4161-865e-aa38b7338f19">
</details>

<details>
<summary> Получение обращения по id </summary>
    -Роут: `http://localhost:8076/api/v1/appeal/{id}`<br>
    -Тип запроса: `GET`<br>
    -Необходимо вместо {id} передать в запрос id требуемого обращения
    <h5>Результат:</h5>
    <img src="https://github.com/Null-ch/Jetmix_test_task/assets/65172872/13d85d55-7709-4834-a397-c0c7690ca90f">
</details>

## PGAdmin
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
