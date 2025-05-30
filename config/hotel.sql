-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role TEXT CHECK(role IN ('admin', 'employer', 'user')) NOT NULL DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- CATEGORIES TABLE (e.g., double, triple, apartment, hall)
CREATE TABLE IF NOT EXISTS categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT UNIQUE NOT NULL,
    description TEXT
);

-- ROOMS TABLE
CREATE TABLE IF NOT EXISTS rooms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT,
    category_id INTEGER,
    availability INTEGER NOT NULL DEFAULT 1, -- 1 = available, 0 = unavailable
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- ROOM IMAGES TABLE
CREATE TABLE IF NOT EXISTS room_images (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_id INTEGER,
    image_path TEXT NOT NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

-- PRICES TABLE
CREATE TABLE IF NOT EXISTS room_prices (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_id INTEGER,
    price REAL NOT NULL,
    currency TEXT DEFAULT 'RON',
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

-- BOOKINGS TABLE
CREATE TABLE IF NOT EXISTS bookings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    room_id INTEGER,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    status TEXT CHECK(status IN ('booked', 'cancelled', 'checked_out')) DEFAULT 'booked',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- PAYMENTS TABLE
CREATE TABLE IF NOT EXISTS payments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    booking_id INTEGER,
    amount REAL NOT NULL,
    payment_method TEXT NOT NULL,
    payment_status TEXT CHECK(payment_status IN ('pending', 'completed', 'failed')) DEFAULT 'pending',
    paid_at DATETIME,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);
