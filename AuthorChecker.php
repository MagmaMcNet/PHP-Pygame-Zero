<?php
require_once 'MagmaMc.UAS.PHP/UserData.php';

function IsAuthor(string $Token, string $Project): bool
{
    if (!UserData->VaildToken($Token))
        return false;

    if (is_dir("./Share/".$Project))
    {
        $ProjectFolder = "./Share/".$Project;
        
        if (is_file($ProjectFolder."/OwnerIDs.db"))
        {
            $OwnerList = file_get_contents($ProjectFolder."/OwnerIDs.db");
            if (strpos($OwnerList, $Token) !== false)
                return true;
        }
    }
    return false;
}
