<?php
require 'vendor/autoload.php';

use Carbon\Carbon;


class Dates
{
    public static function getDay($number)
    {
        switch ($number) {
            case 1:
                $day = "Понеділок";
                break;
            case 2:
                $day = "Вівторок";
                break;
            case 3:
                $day = "Середа";
                break;
            case 4:
                $day = "Четвер";
                break;
            case 5:
                $day = "П'ятниця";
                break;
            case 6:
                $day = "Субота";
                break;
            case 7:
                $day = "Неділя";
                break;
            default:
                $day = "Ведіть число від 1 до 7";
                break;
        }

        return $day;
    }

    public static function getBirthDay()
    {
        $date = new Carbon('12-06-1989');

        return "Мені сьогодні " . $date->age . " років";
    }
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta charset="utf-8">
    <title>
        Program
    </title>
</head>
<body>
<form action="/">
    <p>Який день тижня?</p>
    <input name="day" type="text" value="<?= $_GET['day'] ?>">
    <input type="submit">
</form>

<?php
if (isset($_GET['day'])) {
    echo Dates::getDay($_GET['day']);
}
?>

<p>
    <?php

    printf("Сьогодні: %s", Carbon::now());
    ?>
</p>

<p>
    <?php
    echo Dates::getBirthDay();
    ?>
</p>

<p>
    <?php
    use Jenssegers\Agent\Agent;

    $agent = new Agent();
    $agent->setUserAgent($_SERVER['HTTP_USER_AGENT']);
    $os = $agent->platform();
    $browser = $agent->browser();

    echo "OS: " . $os . ", Browser:" . $browser;
    ?>
</p>

<p>
    <?php
    $faker = Faker\Factory::create();
    ?>
    <img src="<?= $faker->imageUrl() ?>" alt=""/>
</p>


</body>
</html>