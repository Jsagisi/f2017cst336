<?php 
$password = "mypassword";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1>HASH WITH SHA1/SHA2</h1>
        <?php
            // This is what we do when we create or change the password
            $plainHash = saltAndHashWithSHA1($password);
            echo "<div>SALT: ".$plainHash['salt']."</div>";
            echo "<div>HASH: ".$plainHash['hash']."</div>";
            
            // And this is what we do when we login
            $testHash = saltAndHashWithSHA1($password, $plainHash['salt']);
            echo "<div>TEST1: ".$testHash['hash']."</div>";
            
            $isPlainHashValid = ($testHash['hash'] == $plainHash['hash']);
            echo "<div>Is H1 Valid? $isPlainHashValid</div>";
            
        ?>    
        <ol>
            <li></li>
        </ol>

        <h1>HASH WITH BCRYPT</h1>
        <h2>password_hash (Bcrypt) return variable</h2>
        <img src="password_hash.svg" />
        <?php
            // Generate hash            
            $bcryptHash1 = saltAndHashWithBCrypt($password);
            echo "<div>BH1: $bcryptHash1></div>";
            
            // Oops...how do I log back in if salt is regenerated when I come back?
            $bcryptHash2 = saltAndHashWithBCrypt($password);
            echo "<div>BH2: $bcryptHash2></div>";
            
            // Answer: password_verify
            $isBcryptValid1 = password_verify($password, $bcryptHash1);
            echo "<div>Is BH1 Valid? $isBcryptValid1</div>";
            
            $isBcryptValid2 = password_verify($password, $bcryptHash2);
            echo "<div>Is BH2 Valid? $isBcryptValid2</div>";
        ?>
    </body>
</html>

<?php 

// Returns hash and salt to store separately
function saltAndHashWithSHA1($password, $salt = NULL) {
    if (is_null($salt)) {
        $salt = generateBase62String(22);
    }

    $hash = hash('sha1', $salt.$password);
    
    return [
        'hash' => $hash,
        'salt' => $salt
        ];
}

// Returns combined salted hash
function saltAndHashWithBCrypt($password) {
    // Just tell it what it needs to know and you will get everything back in a nice package with a bow....
    $options = [
        'cost' => 11,
        //'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        //'salt' => generateBase62String(22),
    ];
    
    return password_hash($password, PASSWORD_BCRYPT, $options);
}


/*
 * Generate a random string, using a cryptographically secure
 * pseudorandom number generator (random_int)
 *
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 *
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */


/**
 *
 *
 * @param string  $length
 * @param string  $keyspace (optional)
 * @return
 */
function generateBase62String($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        // Using rand for simplicity, but use random_int as described in flowerbox
        // for more secure implementation

        $randomInt;
        if (version_compare(PHP_VERSION, '7.0.0', '<') ) {
            $randomInt = mt_rand(0, $max);
        }
        else {
            $randomInt = random_int(0, $max);
        }
        $str .= $keyspace[$randomInt];
    }
    return $str;
}





?>