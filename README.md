
# Weltall Plugin

The **Weltall** plugin allows you to manage planet data within WordPress.  
This plugin requires a custom database table to store the planet information.

---

## 🔧 Database Setup

Before using the plugin, you must manually create the required database table and insert some example data.

### 1. Create the `wp_planeten` table

Run this SQL statement in your database (e.g., via phpMyAdmin or Adminer):

```sql
CREATE TABLE wp_planeten (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    umfang_km INT,
    entfernung_sonne_km BIGINT,
    zusatz TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Table columns:**
- `name`: Name of the planet
- `umfang_km`: Circumference in kilometers
- `entfernung_sonne_km`: Distance to the sun in kilometers (BIGINT is used to support large distances)
- `zusatz`: Additional information in Markdown format
- `created_at`: Timestamp when the planet was added

---

### 2. Insert Example Planets

Run this SQL statement to insert 5 example planets into the table:

```sql
INSERT INTO wp_planeten (name, umfang_km, entfernung_sonne_km, zusatz) VALUES
('Mars', 21344, 227900000, '## Beschreibung\nÜber den Planeten gibt es **sehr** viel zu erzählen.<br />\nAber wo fangen wir da an?'),
('Pluto', 7232, 5900000000, '## Beschreibung\nÜber den Planeten gibt es **sehr** viel zu erzählen.<br />\nAber wo fangen wir da an?'),
('Saturn', 378675, 1430000000, '## Beschreibung\nÜber den Planeten gibt es **sehr** viel zu erzählen.<br />\nAber wo fangen wir da an?'),
('Erde', 40075, 149600000, '## Beschreibung\nÜber den Planeten gibt es **sehr** viel zu erzählen.<br />\nAber wo fangen wir da an?'),
('Dagobah', 8900, 502500000000000, '## Beschreibung\nÜber den Planeten gibt es **sehr** viel zu erzählen.<br />\nAber wo fangen wir da an?');
```

---

## ✅ Plugin Functionality

- Retrieves the latest 3 planets from the `wp_planeten` table.
- Converts the `zusatz` Markdown data into HTML using the [michelf/php-markdown](https://github.com/michelf/php-markdown) library.
- Displays the planets with a WordPress shortcode.

---

## 📦 Composer Dependency

Install the **michelf/php-markdown** library using Composer:

1. Navigate to your plugin directory:
   ```bash
   cd wp-content/plugins/weltall
   ```
2. Initialize Composer (if needed):
   ```bash
   composer init -n
   ```
3. Install the Markdown parser:
   ```bash
   composer require michelf/php-markdown
   ```

---

## 🔧 Shortcode Usage

Use this shortcode anywhere in your WordPress pages or posts to display the latest planets:

```
[weltall]
```

---

## ✔ Example Output

Example output of the shortcode:

```
Mars
Circumference: 21344 km
Distance to the sun: 227900000 km

## Beschreibung
Über den Planeten gibt es **sehr** viel zu erzählen.
Aber wo fangen wir da an?
```

The Markdown will be automatically converted to HTML on the page.

---

## 📁 Plugin Structure Example

```
weltall/
├── weltall.php
├── vendor/                # Composer libraries
├── composer.json
└── README.md
```

---

## ℹ️ Additional Notes

- The database setup must currently be done manually.
- The plugin does **not** create the table automatically during activation.
- Example data can be adjusted or extended as needed.

---

## License

MIT License (or adjust to your needs).
