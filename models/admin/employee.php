<?php

function get_all_employee() {
    return pdo_query(
        'SELECT id_user, username
        FROM user'
    );
}
