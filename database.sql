CREATE TABLE Countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(64) NOT NULL
);

CREATE TABLE Cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(64) NOT NULL,
    countryid INT,
    FOREIGN KEY (countryid) REFERENCES Countries(id) ON DELETE CASCADE
);

-- Наполним данными для теста
INSERT INTO Countries (country) VALUES ('Украина'), ('Германия'), ('Франция');
INSERT INTO Cities (city, countryid) VALUES ('Киев', 1), ('Львов', 1), ('Берлин', 2), ('Мюнхен', 2), ('Париж', 3);

-- Задание 2: Пользователи (если таблицы еще нет)
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(64) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL
);