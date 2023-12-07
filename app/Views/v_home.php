<h1>Welcome <?php if (session()->get('level') == 1) {
                echo 'Admin';
            } else {
                echo 'User';
            }
            ?></h1>