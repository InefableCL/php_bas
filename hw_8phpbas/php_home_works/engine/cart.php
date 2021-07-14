<?php
function getCart() {
    return getAssocResult("SELECT * FROM cart;");
}

