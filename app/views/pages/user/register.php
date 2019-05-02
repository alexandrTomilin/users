<style>

    body
    {
        /*background-color: rgba(0, 0, 0, 1);*/
    }

    form
    {
        padding: 50px 0;
        display: flex;
        flex-direction: column;
    }

    form input, .modal-body form label
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

<section class="register">

    <form action="/account/add" method="post" id="registerForm">

        <input type="text" name="login" placeholder="login" class="cyrillic number form-input" />

        <br>

        <input type="text" name="name" placeholder="Имя" id="name" class="latin form-input" />

        <br>

        <input type="text" name="password" placeholder="password form-input" />

        <br>

        <input type="text" name="email" placeholder="email form-input" />

        <br>

        <div class="captcha-wrapper">

            <img src="/vendor/lib/captcha.php?sid=<?php echo rand(10000, 99999); ?>" id="captcha" alt="captcha" />

            <br>

            <br>

            <input type="text" name="captcha" placeholder="captcha form-input" />
        </div>

        <br>

        <button type="submit">Регистрация</button>

    </form>

</section>
