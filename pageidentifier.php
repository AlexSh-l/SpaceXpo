<?php
function Identifier()
{
    if (!isset($_GET['page'])) {
        return 'Home';
    } else {
        switch ($_GET['page']) {
            case 'Home':
            case 'SolarSystem':
            case 'Galaxy':
            case 'News':
            case 'Survey':
                return $_GET['page'];
                break;
            default:
                return 'Home';
        }
    }
}

?>