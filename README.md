# *StarView Cinema*

![preview](images/image.png)

### Project by:

## Description.
This project is an online platform where users can buy their tickets to see the most anticipated movie, A platform of combines two web frameworks (Laravel & Flask) to perform interesting things like building REST API.

# Main technologies:

## [LARAVEL.](https://laravel.com/)
**Laravel** was used to build the whole page, thanks to the **MVC** (Model View Controller) pattern, we managed to create **CRUD** operations, view and controllers to build a usable dynamic web page.

## [FLASK.](https://flask.palletsprojects.com/en/2.3.x/)
**Flask** was used to build a **REST API** architecture hand in hand with Laravel. This with the objetive of handling transaccions and storing them in a nosql database, to later generate tickets that will be send to the user's email.


#  More Languages and Databases.

| **N°**       | **Technologie** | **Version** |
|--------------|:---------------:|------------:|
| 1            | Laravel (PHP)   | 10.10       |
| 2            | Flask (Python)  | 2.3.2       |
| 3            | MariaDB         | 10.11.4     |
| 4            | MongoDB         | 1.9.1       |
| 5            | JavaScript      | *           |
| 6            | HTML            | *           |
| 7            | CSS             | *           |
| 8            | Boostrap        | *           |

---

# Instalation.
## Note:
### The entire project was developed on Linux, so many of the commands will only work on Linux.

**clone the repository.**

```bash
git clone https://JsasMachaca/sadad.git
cd StarView\ Cinema
```

# Laravel Dependencies:
**To access directory**
```bash
cd Laravel
```

**Migrate and install dependencies.**
```bash
php artisan migrate
npm install
```

# Flask Dependencies:
**To access directory.**
```bash
cd Flask
```

### Create and activate vitual enviroment (Linux & Windows).
**In Linux:**
```bash
python -m venv venv
source venv/bin/activate
```

**In Windows:**
```bash
python -m venv venv
venv/Scripts/activate
```

**Install all dependencies.**
```bash
pip -r requirements.txt
```

# Activate DATABASES (Linux).

**Activate MySql.**
```bash
systemctl start mariadb
```
**or**
```bash
systemctl start mysql
```

**Activate MongoDB.**
```bash
systemctl mongodb
```
# Activate all serves.

**Activate Laravel project.**
```bash
php artisan serve &
npm run dev &
```
**Activate Flask Project**
```bash
python main.py
```
---