<? if ($auth): ?>
    Добро пожаловать <?= $name ?>, <a href="/logout">[Выход]</a>
<? else: ?>
    <form action="/login" method="post">
        <input type="text" name="login">
        <input type="text" name="pass">
        Save? <input type='checkbox' name='save'>
        <input type="submit">
    </form>
<? endif; ?>
<br>
<a href="/">Главная</a>
<a href="/catalog">Каталог</a>
<a href="/about">О нас</a>
<a href="/cart">Корзина (<?=$count?>)</a>
