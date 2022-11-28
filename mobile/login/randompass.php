<?

function generateRandomPassword($length=18, $strength=4) {

    $vowels = 'aeuy';

    $consonants = 'bdghjmnpqrstvz';

    if ($strength & 1) {

        $consonants .= 'BDGHJLMNPQRSTVWXZ';

    }

    if ($strength & 2) {

        $vowels .= "AEUY";

    }

    if ($strength & 4) {

        $consonants .= '23456789';

    }

    if ($strength & 8) {

        $consonants .= '@#$%';

    }


    $password = '';

    $alt = time() % 2;

    for ($i = 0; $i < $length; $i++) {

        if ($alt == 1) {

            $password .= $consonants[(rand() % strlen($consonants))];
            // php에서는 랜덤함수가 rand()
            $alt = 0;

        } else {

            $password .= $vowels[(rand() % strlen($vowels))];

            $alt = 1;

        }

    }

    return $password;

}


$ranpass = generateRandomPassword(18,4);

echo "$ranpass";

?>