-- Sprawdź czy tabela 'strona' istnieje, jeśli nie, utwórz ją
IF NOT EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'strona') THEN
    CREATE TABLE strona(
        id INT AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY,
        nazwa VARCHAR(255) NOT NULL UNIQUE,
        id_tworcy INT NOT NULL
    );
END IF;

-- Sprawdź czy tabela 'uzytkownicy' istnieje, jeśli nie, utwórz ją
IF NOT EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'uzytkownicy') THEN
    CREATE TABLE uzytkownicy(
        id INT AUTO_INCREMENT NOT NULL UNIQUE PRIMARY KEY,
        imie VARCHAR(255) NOT NULL,
        nazwisko VARCHAR(255) NOT NULL
    );
END IF;
