<?php
        setcookie('user_id', $user['user_id'], time() - 3600, '/');
        setcookie('user_name', $user['user_name'], time() - 3600, '/');
        setcookie('user_surename', $user['user_surename'], time() - 3600, '/');
        setcookie('user_login', $user['user_login'], time() - 3600, '/');
        setcookie('user_email', $user['user_email'], time() - 3600, '/');
        setcookie('role_id', $user['role_id'], time() - 3600, '/');
        setcookie('user_phone', $user['user_phone'], time() - 3600, '/');

        header('Location: /');