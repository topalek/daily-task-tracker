# Daily Task Tracker

Web-приложение для ежедневного управления задачами: создавайте задачи, организуйте по категориям, отслеживайте прогресс и повторяющиеся задачи.

## Технологии

| Компонент | Версия |
|---|---|
| PHP | >= 8.3 |
| Laravel | 13.x |
| MySQL/MariaDB | 11.8+ |
| Tailwind CSS | 4.x |
| Vite | 8.x |
| PHPUnit | 12.x |

## Установка

```bash
git clone <repo-url>
cd daily-tracker
```

### Бэкенд

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

Настройте подключение к БД в `.env` (по умолчанию SQLite):

```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### Фронтенд

```bash
npm install
npm run dev     # разработка
npm run build   # продакшн
```

### Запуск

```bash
composer dev     # или: php artisan dev
```

Приложение: [http://localhost:8000](http://localhost:8000)

## Структура БД

```
users
├── id, name, email, password, ...

categories
├── id, user_id (FK), name
│
tasks
├── id, user_id (FK), category_id (FK, nullable)
├── title, description (nullable)
├── is_recurring (boolean, default false)
├── task_date (datetime, nullable)
├── completed_at (datetime, nullable)
```

Связи: `User → Categories (1:N)`, `User → Tasks (1:N)`, `Category → Tasks (1:N)`

## Роуты

| Метод | URI | Описание |
|---|---|---|
| GET | `/` | Лендинг (публичный) |
| GET | `/login` | Форма входа |
| POST | `/login` | Авторизация |
| GET | `/register` | Форма регистрации |
| POST | `/register` | Регистрация |
| GET | `/reset-password` | Сброс пароля |

> **Замечание:** Маршруты `dashboard` и `logout` пока закомментированы, контроллеры находятся в стадии разработки.

## Структура проекта

```
app/
├── Http/Controllers/
│   ├── AuthController.php          # Авторизация (login, register, reset-password)
│   └── DashboardController.php     # Панель управления (пустой)
├── Models/
│   ├── User.php
│   ├── Task.php
│   └── Category.php
└── Providers/

resources/
├── css/app.css                     # Tailwind v4 + тема dark/light
├── js/app.js                       # Переключатель темы
└── views/
    ├── welcome.blade.php           # Лендинг
    ├── auth/                       # Auth-формы (login, register, reset-password, ...)
    └── components/                 # Blade-компоненты (layouts, inputs)
```

## Особенности

- Лендинг-страница с описанием функционала
- Переключатель темы dark/light (сохраняется в localStorage)
- Система категорий для организации задач
- Поддержка повторяющихся задач (`is_recurring`)
- Отслеживание даты выполнения и времени завершения

## Тестирование

```bash
composer test       # или: php artisan test
```

Тесты работают с in-memory SQLite, отдельно от основной БД.

## Лицензия

[MIT](https://opensource.org/licenses/MIT)
