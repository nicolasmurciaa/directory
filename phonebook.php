<?php
// ------ 
// ------         Created by https://github.com/hbonath ------ 
// ------         Update by Nicolas Murcia              ------
//
// load FreeBPX bootstrap environment, requires FreePBX 2.9 or higher
if (!@include_once(getenv('FREEPBX_CONF') ? getenv('FREEPBX_CONF') : '/etc/freepbx.conf')) {
include_once('/etc/asterisk/freepbx.conf');
}

// set FreePBX globals
global $db;  // FreePBX asterisk database connector
global $amp_conf;  // array with Asterisk configuration
global $astman;  // AMI
$usuarios = 98; // Cantidad extensiones encontradas por variable $sql

$sql = "SELECT name,extension FROM users ORDER BY extension";
$results = $db->getAll($sql, DB_FETCHMODE_ORDERED);  // 2D array of all FreePBX users
$numrows = count($results);
$endoflist = False;

// XML Output Below
header ("content-type: text/xml");

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<YealinkIPPhoneDirectory>\n";

if ($numrows >=1) {
        // set up variables for dealing with >32 entries
        $page = $_GET["page"];
        if (empty($page)) {
                $page = 0;      // set first page by default
        }
        $count = $page * 1 ;
        for ($row=$count; $row <= $count+$usuarios; $row++) {
            if (is_null($results[$row][0])) {
                $endoflist = True;
            }
            else {
                    $endoflist = False;
                        echo "  <DirectoryEntry>\n";
                        echo "          <Name>" . $results[$row][0] . "</Name>\n";
                        echo "          <Telephone>" . $results[$row][1] . "</Telephone>\n";
                        echo "  </DirectoryEntry>\n";
            }
        }

}

echo "</YealinkIPPhoneDirectory>";

//END
?>