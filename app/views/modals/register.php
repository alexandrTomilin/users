<style>
    .modal-body form
    {
        display: flex;
        flex-direction: column;

    }

    .modal-body form input, .modal-body form label
    {
        padding: 5px;
    }

    .captcha-wrapper
    {
        display: table;
        margin: auto;
    }

    .captcha-wrapper img
    {
        margin: auto;
        display: block;
    }
</style>

<form action="/account/register" method="post" id="registerForm">

    <input type="text" name="login" placeholder="login" class="cyrillic number" />

    <br>

    <input type="text" name="name" placeholder="Имя" id="name" class="latin" />

    <br>

    <input type="text" name="password" placeholder="password" />

    <br>

    <input type="text" name="email" placeholder="email" />

    <br>

    <div class="captcha-wrapper">

        <img src="/vendor/lib/captcha.php?sid=<?php echo rand(10000, 99999); ?>" id="captcha" alt="captcha" />

        <br>

        <br>

        <input type="text" name="captcha" placeholder="captcha" />
    </div>

    <br>

    <button type="submit">Регистрация</button>

</form>