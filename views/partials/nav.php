<?php if($_SESSION['user'] ?? false) : ?>
    <form action="/logout" method="post" class="flex end">
        <input type="hidden" name="_method" value="DELETE" />
        <button>Log out</button>
    </form>
<?php else : ?>
    <div class="centered">
        <a href="/register" class="<?= urlIs('/register') ? '' : '' ?>">Register</a>
        &nbsp;/&nbsp;
        <a href="/login" class="<?= urlIs('/login') ? '' : '' ?>">Log in</a>
    </div>
<?php endif; ?>

<menu>
    <li class="<?= urlIs('/') ? 'selected' : '' ?>"><a href="/">Home</a></li>
    <li class="<?= urlIs('/about') ? 'selected' : '' ?>"><a href="/about" >About</a></li>
    <li class="<?= urlIs('/notes') ? 'selected' : '' ?> <?php if(!isset($_SESSION['user']) ?? true) {echo "disabled";} ?>"><a href="/notes">Notes</a></li>
</menu>