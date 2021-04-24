

CREATE TABLE IF NOT EXISTS account (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    phone VARCHAR(200) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL UNIQUE,
    role VARCHAR(200) DEFAULT 'customer',
    address VARCHAR(200) NOT NULL UNIQUE,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hoat dong, 0 la khoa',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS category (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    prioty tinyint DEFAULT '0',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS banner (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    image VARCHAR(200) NOT NULL,
    link VARCHAR(200) NOT NULL,
    description VARCHAR(200),
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    prioty tinyint DEFAULT '0',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    image VARCHAR(200) NOT NULL,
    image_list text,
    price float(9.3) NOT NULL,
    sale_price float(9.3) DEFAULT'0',
    description text,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    category_id int NOT NULL,
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW(),
    FOREIGN KEY (category_id) REFERENCES category(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS blog (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    image VARCHAR(200) NOT NULL,
    description VARCHAR(200),
    sumary text,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    account_id int NOT NULL,
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW(),
    FOREIGN KEY (account_id) REFERENCES account(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order` (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    phone VARCHAR(200) NOT NULL UNIQUE,
    address VARCHAR(200) NOT NULL UNIQUE,
    note text,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    account_id int NOT NULL,
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW(),
    FOREIGN KEY (account_id) REFERENCES account(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `color` (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `size` (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL UNIQUE,
    status tinyint(1) DEFAULT '1' COMMENT '1 la hien thi, 0 la an',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS order_details (
    order_id int NOT NULL,
    productdetails_id int ,
    quantity int NOT NULL,
    price float NOT NULL,
    FOREIGN KEY (order_id) REFERENCES `order`(id),
    
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS product_details (
    productdetail_id int PRIMARY KEY AUTO_INCREMENT,
    color_id int NOT NULL,
    size_id int NOT NULL,
    
    FOREIGN KEY (product_id) REFERENCES `product`(id),
    FOREIGN KEY (color_id) REFERENCES `color`(id),
    FOREIGN KEY (size_id) REFERENCES `size`(id),
FOREIGN KEY (productdetail_id) REFERENCES order_details (productdetails_id ),
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
) ENGINE = InnoDB;

