-- Create full-text search index
CREATE FULLTEXT INDEX `idx_ft_product_name_description`
       ON `product` (`name`, `description`);



--- создаем хранимую процедуру catalog_count_search_result
CREATE PROCEDURE catalog_count_search_result(
IN inSearchString TEXT, IN inAllWords VARCHAR(3))
BEGIN
IF inAllWords = "on" THEN
    PREPARE statement from
    "SELECT count(*)
    FROM product
    WHERE MATCH (name, description) AGAINST (? IN BOOLEAN MODE)";
ELSE 
    PREPARE statement from
    "SELECT count(*)
    FROM product
    WHERE MATCH (name, description) AGAINST (?)";
END IF;
SET @p1 = inSearchString;
EXECUTE statement USING @p1;
END$$


--создаем хранимую процедуру catalog_search

CREATE PROCEDURE catalog_search(
  IN inSearchString TEXT, IN inAllWords VARCHAR(3),
  IN inShortProductDescriptionLength INT,
  IN inProductsPerPage INT, IN inStartItem INT)
BEGIN
  IF inAllWords = "on" THEN
    PREPARE statement FROM
      "SELECT   product_id, name,
                IF(LENGTH(description) <= ?,
                   description,
                   CONCAT(LEFT(description, ?),
                          '...')) AS description,
                price, discounted_price, thumbnail
       FROM     product
       WHERE    MATCH (name, description)
                AGAINST (? IN BOOLEAN MODE)
       ORDER BY MATCH (name, description)
                AGAINST (? IN BOOLEAN MODE) DESC
       LIMIT    ?, ?";
  ELSE
    PREPARE statement FROM
      "SELECT   product_id, name,
                IF(LENGTH(description) <= ?,
                   description,
                   CONCAT(LEFT(description, ?),
                          '...')) AS description,
                price, discounted_price, thumbnail
       FROM     product
       WHERE    MATCH (name, description) AGAINST (?)
       ORDER BY MATCH (name, description) AGAINST (?) DESC
       LIMIT    ?, ?";
  END IF;

  SET @p1 = inShortProductDescriptionLength;
  SET @p2 = inSearchString;
  SET @p3 = inStartItem;
  SET @p4 = inProductsPerPage;

  EXECUTE statement USING @p1, @p1, @p2, @p2, @p3, @p4;
END$$


--создаем хранимую процедуру catalog_get_departments

CREATE PROCEDURE catalog_get_departments()
BEGIN
    SELECT department_id, name, description
    FROM department
    ORDER BY department_id;
END$$

--создаем хранимую процедуру catalog_add_department
CREATE PROCEDURE catalog_add_department(
IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN 
    INSERT INTO department (name, description)
    VALUES (inName, inDescription);
END$$

--создаем хранимую процедуру catalog_update_department
CREATE PROCEDURE catalog_update_department(
IN inDepartmentId INT, IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN 
    UPDATE department
    SET name = inName, description = inDescription
    WHERE department_id = inDepartmentId;
END$$

--создаем хранимую процедуру catalog_delete_department
CREATE PROCEDURE catalog_delete_department (IN inDepartmentId INT)
BEGIN 
    DECLARE categoryRowsCount INT;
    
    SELECT count(*)
    FROM category
    WHERE department_id = inDepartmentId
    INTO categoryRowsCount;
    IF categoryRowsCount = 0 THEN
    DELETE FROM department WHERE department_id = inDepartmentId;
    
    SELECT 1;
   ELSE
    SELECT -1;
    END IF;
END$$


-- Create catalog_get_department_categories stored procedure
CREATE PROCEDURE catalog_get_department_categories(IN inDepartmentId INT)
BEGIN
  SELECT   category_id, name, description
  FROM     category
  WHERE    department_id = inDepartmentId
  ORDER BY category_id;
END$$

-- Create catalog_add_category stored procedure
CREATE PROCEDURE catalog_add_category(IN inDepartmentId INT,
  IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN
  INSERT INTO category (department_id, name, description)
         VALUES (inDepartmentId, inName, inDescription);
END$$

-- Create catalog_update_category stored procedure
CREATE PROCEDURE catalog_update_category(IN inCategoryId INT,
  IN inName VARCHAR(100), IN inDescription VARCHAR(1000))
BEGIN
    UPDATE category
    SET    name = inName, description = inDescription
    WHERE  category_id = inCategoryId;
END$$

-- Create catalog_delete_category stored procedure
CREATE PROCEDURE catalog_delete_category(IN inCategoryId INT)
BEGIN
  DECLARE productCategoryRowsCount INT;

  SELECT      count(*)
  FROM        product p
  INNER JOIN  product_category pc
                ON p.product_id = pc.product_id
  WHERE       pc.category_id = inCategoryId
  INTO        productCategoryRowsCount;

  IF productCategoryRowsCount = 0 THEN
    DELETE FROM category WHERE category_id = inCategoryId;

    SELECT 1;
  ELSE
    SELECT -1;
  END IF;
END$$



-- Create catalog_get_attributes stored procedure
CREATE PROCEDURE catalog_get_attributes()
BEGIN
  SELECT attribute_id, name FROM attribute ORDER BY attribute_id;
END$$

-- Create catalog_add_attribute stored procedure
CREATE PROCEDURE catalog_add_attribute(IN inName VARCHAR(100))
BEGIN
  INSERT INTO attribute (name) VALUES (inName);
END$$

-- Create catalog_update_attribute stored procedure
CREATE PROCEDURE catalog_update_attribute(
  IN inAttributeId INT, IN inName VARCHAR(100))
BEGIN
  UPDATE attribute SET name = inName WHERE attribute_id = inAttributeId;
END$$

-- Create catalog_delete_attribute stored procedure
CREATE PROCEDURE catalog_delete_attribute(IN inAttributeId INT)
BEGIN
  DECLARE attributeRowsCount INT;

  SELECT count(*)
  FROM   attribute_value
  WHERE  attribute_id = inAttributeId
  INTO   attributeRowsCount;

  IF attributeRowsCount = 0 THEN
    DELETE FROM attribute WHERE attribute_id = inAttributeId;

    SELECT 1;
  ELSE
    SELECT -1;
  END IF;
END$$

-- Create catalog_get_attribute_details stored procedure
CREATE PROCEDURE catalog_get_attribute_details(IN inAttributeId INT)
BEGIN
  SELECT attribute_id, name
  FROM   attribute
  WHERE  attribute_id = inAttributeId;
END$$

-- Create catalog_get_attribute_values stored procedure
CREATE PROCEDURE catalog_get_attribute_values(IN inAttributeId INT)
BEGIN
  SELECT   attribute_value_id, value
  FROM     attribute_value
  WHERE    attribute_id = inAttributeId
  ORDER BY attribute_id;
END$$

-- Create catalog_add_attribute_value stored procedure
CREATE PROCEDURE catalog_add_attribute_value(
  IN inAttributeId INT, IN inValue VARCHAR(100))
BEGIN
  INSERT INTO attribute_value (attribute_id, value)
         VALUES (inAttributeId, inValue);
END$$

-- Create catalog_update_attribute_value stored procedure
CREATE PROCEDURE catalog_update_attribute_value(
  IN inAttributeValueId INT, IN inValue VARCHAR(100))
BEGIN
    UPDATE attribute_value
    SET    value = inValue
    WHERE  attribute_value_id = inAttributeValueId;
END$$

-- Create catalog_delete_attribute_value stored procedure
CREATE PROCEDURE catalog_delete_attribute_value(IN inAttributeValueId INT)
BEGIN
  DECLARE productAttributeRowsCount INT;

  SELECT      count(*)
  FROM        product p
  INNER JOIN  product_attribute pa
                ON p.product_id = pa.product_id
  WHERE       pa.attribute_value_id = inAttributeValueId
  INTO        productAttributeRowsCount;

  IF productAttributeRowsCount = 0 THEN
    DELETE FROM attribute_value WHERE attribute_value_id = inAttributeValueId;

    SELECT 1;
  ELSE
    SELECT -1;
  END IF;
END$$

--создаем хранимую процедуру catalog_get_category_products
create procedure catalog_get_category_products (IN  inCategoryId INT)
begin
    select p.product_id, p.name, p.description, p.price, p.discounted_price
    from product p
    inner join product_category pc
                on p.product_id = pc.product_id
    where pc.category_id = inCategoryId
    order by p.product_id;
end$$

--создаем хранимую процедуру catalog_add_product_to_category
create procedure catalog_add_product_to_category (IN inCategoryId INT, IN inName VARCHAR(100), 
IN inDescription VARCHAR(1000), IN inPrice DECIMAL(10,2))
BEGIN
    DECLARE productLastInsertId INT;
    insert into product (name, description, price)
    values (inName, inDescription, inPrice);
    
    select last_insert_id() into productLastInsertId;
    
    insert into product_category (product_id, category_id)
    values (productLastInsertId, inCategoryId);
END$$

-- Create shopping_cart table
CREATE TABLE `shopping_cart` (
  `item_id`     INT           NOT NULL  AUTO_INCREMENT,
  `cart_id`     CHAR(32)      NOT NULL,
  `product_id`  INT           NOT NULL,
  `attributes`  VARCHAR(1000) NOT NULL,
  `quantity`    INT           NOT NULL,
  `buy_now`     BOOL          NOT NULL  DEFAULT true,
  `added_on`    DATETIME      NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `idx_shopping_cart_cart_id` (`cart_id`)
) ENGINE=MyISAM;


--создаем хранимую процедуру shopping_cart_add_product
create procedure shopping_cart_add_product (IN inCartId CHAR(32), 
IN inProductId INT, IN inAttributes VARCHAR(1000))
BEGIN
DECLARE productQuantity INT;
SELECT quantity
FROM shopping_cart
    WHERE cart_id = inCartId
    AND product_id = inProductId
    AND attributes = inAttributes
INTO productQuantity;

IF productQuantity IS NULL THEN
    INSERT INTO shopping_cart(cart_id, product_id, attributes, quantity, 
                                added_on)
    VALUES (inCartId, inProductId, inAttributes, 1, NOW());
ELSE
    UPDATE shopping_cart
    SET quantity = quantity + 1, buy_now = true
    WHERE cart_id = inCartId
    AND product_id = inProductId
    AND attributes = inAttributes;
END IF;
END$$

--создаем хранимую процедуру shopping_cart_update
create procedure shopping_cart_update(IN inItemId INT, IN inQuantity INT)
begin 
    if inQuantity > 0 then
        update shopping_cart
        set quantity = inQuantity, added_on = NOW()
        where item_id = inItemId;
    else
        call shopping_cart_remove_product(inItemId);
END IF;
END$$

--создаем хранимую процедуру shopping_cart_remove_product
create procedure shopping_cart_remove_product(IN inItemId INT)
begin 
    delete from shopping_cart where item_id = inItemId;
END$$

--создаем хранимую процедуру shopping_cart_get_products
create procedure shopping_cart_get_products(IN inCartId char(32))
begin
    select sc.item_id, p.name, sc.attributes,
    COALESCE(NULLIF(p.discount_price, 0),p.price) AS price, sc.quantity,
    COALESCE(NULLIF(p.discount_price, 0), p.price) * sc.quantity AS subtotal
    from shopping_cart sc
    inner join product p
        on sc.product_id = p.product_id
        where sc.cart_id = inCartId AND sc.buy_now;
END$$

--создаем хранимую процедуру shopping_cart_get_saved_products
create procedure shopping_cart_get_saved_products(IN inCartId char(32))
begin
    select sc.item_id, p.name, sc.attributes,
    COALESCE(NULLIF(p.discount_price, 0),p.price) AS price
    from shopping_cart sc
    inner join product p
        on sc.product_id = p.product_id
    where sc.cart_id = inCartId AND sc.buy_now;
END$$

--создаем хранимую процедуру shopping_cart_get_total_amount
create procedure shopping_cart_get_total_amount(in inCartId CHAR(32))
begin
    select sum(coalesce(nullif(p.discount_price, 0), p.price) 
                * sc.quantity) AS total_amount
    from shopping_cart sc
    inner join product p
        on sc.product_id = p.product_id
    where sc.cart_id = inCartId AND sc.buy_now;
END$$

--создаем хранимую процедуру shopping_cart_save_product_for_later
create procedure shopping_cart_save_product_for_later(in inItemId INT)
BEGIN 
    UPDATE shopping_cart
    set buy_now = false, quantity = 1
    where item_id = inItemId;
END$$

--создаем хранимую процедуру shopping_cart_move_product_to_cart
create procedure shopping_cart_move_product_to_cart(in inItemId INT)
BEGIN
    UPDATE  shopping_cart
    SET buy_now = true, added_on = now()
    WHERE item_id = inItemId;
END$$