
CREATE DATABASE sports_management ;
USE sports_management ;


CREATE TABLE admin (
  admin_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  password VARCHAR(255)
);

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '1234');


CREATE TABLE bookings (
  booking_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  student_id INT,
  event_id INT,
  status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
  booking_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE coaches (
  coach_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  phone VARCHAR(15),
  specialization TEXT,
  profile_image VARCHAR(255)
);

CREATE TABLE courts (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  court_name VARCHAR(100),
  location VARCHAR(100),
  available_from VARCHAR(100),
  available_to VARCHAR(100),
  status VARCHAR(100) DEFAULT 'available',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE equipment (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  quantity INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(50) DEFAULT 'Available'
);
CREATE TABLE events (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  event_name VARCHAR(100),
  description TEXT,
  event_date DATE,
  location VARCHAR(100),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE feedback (
  feedback_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  student_id INT,
  coach_id INT,
  message TEXT,
  rating INT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE students (
  student_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  phone VARCHAR(15),
  profile_image VARCHAR(255)
);
CREATE TABLE training_sessions (
  training_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  coach_id INT,
  title VARCHAR(150),
  description TEXT,
  location VARCHAR(255),
  schedule DATETIME,
  image VARCHAR(255),
  status ENUM('Pending', 'Approved', 'Rejected') NOT NULL DEFAULT 'Pending'
);
