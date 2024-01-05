-- Assuming product_id is the foreign key in order_details referencing the id in product table
DELIMITER //

-- Trigger for UPDATE operation on the product table
CREATE TRIGGER before_product_update
BEFORE UPDATE ON product
FOR EACH ROW
BEGIN
    IF NEW.id <> OLD.id THEN
        UPDATE order_details SET product_id = NEW.id WHERE product_id = OLD.id;
    END IF;
END;
//

-- Trigger for DELETE operation on the product table
CREATE TRIGGER before_product_delete
BEFORE DELETE ON product
FOR EACH ROW
BEGIN
    DELETE FROM order_details WHERE product_id = OLD.id;
END;
//

DELIMITER ;