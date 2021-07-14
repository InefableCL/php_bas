<?php
function getCatalog(){
    return getAssocResult("SELECT `id`, `name`, `description`, `price`, `path` FROM products;");
    
}
