# 🔗 URL Shortening Service API

A simple Laravel-based RESTful API that allows users to shorten long URLs, retrieve original URLs, update or delete short URLs, and track access statistics.

---

## 📌 Features

- Shorten long URLs to unique short codes  
- Retrieve the original long URL  
- Track number of times a short URL is accessed  
- Update or delete existing short URLs  
- SQLite as database (lightweight and file-based)  
- Built with Laravel (PHP framework)

---

## 🧠 Concepts Covered

- ✅ RESTful API Design  
- ✅ Laravel Framework  
- ✅ Database Indexing  
- ✅ HTTP Redirects  
- ✅ URL Shortening Logic  
- ✅ SQLite Database  

---

## 🔧 Tech Stack

- **Backend**: Laravel (PHP)  
- **Database**: SQLite  
- **Language**: PHP  

---

## 🚀 How to Run the Project

Follow these steps to clone and run the project locally:

### 1. Clone the repository

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

### 2. Install dependencies

Make sure Composer is installed:

```bash
composer install
```

### 3. Create environment config

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure SQLite database

Inside your `.env` file, update these lines:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

> 📁 If `database.sqlite` file does not exist, create it manually:

```bash
touch database/database.sqlite
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Serve the API

```bash
php artisan serve
```

> Access it at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📫 API Endpoints

### ✅ Create Short URL
```
POST /shorten
```
```json
{
  "url": "https://www.example.com/some/long/url"
}
```

### ✅ Retrieve Original URL
```
GET /shorten/{shortCode}
```

### ✅ Update Short URL
```
PUT /shorten/{shortCode}
```
```json
{
  "url": "https://www.example.com/updated/url"
}
```

### ✅ Delete Short URL
```
DELETE /shorten/{shortCode}
```

### ✅ Get URL Stats
```
GET /shorten/{shortCode}/stats
```

---

## 📝 Sample Response

```json
{
  "id": 1,
  "url": "https://www.example.com/some/long/url",
  "shortCode": "abc123",
  "createdAt": "2021-09-01T12:00:00Z",
  "updatedAt": "2021-09-01T12:00:00Z",
  "accessCount": 10
}
```

---

## ❗ Notes

- Short codes are randomly generated and unique.  
- No authentication or frontend is included.  
- SQLite is used for quick setup and file-based storage.

---

## 👍 Credits

Created as a learning project to demonstrate Laravel RESTful API development and database usage with SQLite.

https://roadmap.sh/projects/url-shortening-service