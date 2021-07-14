<h2>Каталог</h2>

?>
<?php //var_dump($catalog)?>
<?php foreach ($catalog as $item){?>
    <div>
        <?=$item['name']?><br>
            <?=$item['description']?><br>
            <img src="<?=$item['path']?>" style="width: 200px"></img>
            <?=$item['price']?><br>
            <a href="/buy/?prod_id=<?=$item['id']?>">BUY</a>
    </div>

<?php }?>