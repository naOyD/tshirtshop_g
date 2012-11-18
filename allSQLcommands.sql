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














