<?php

     file_put_contents("/var/www/html/g.txt", file_get_contents("php://input") . "\n\n", FILE_APPEND | LOCK_EX);
    // exit;

    $token = '1455987022:AAEXCEdx6UpAANyWIFNqY_UcJCWP57tUu8o';
    $j = json_decode(file_get_contents("php://input"));

    function doRandom()
    {
        GLOBAL $j, $token;
        $file = file("kaecyquotes.txt");
        $line = $file[rand(0, count($file) - 1)];
        $chatid = $j->{'message'}->{'chat'}->{'id'};
        file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid . "&parse_mode=HTML&text=" . urlencode("<a href=\"tg://user?id=1155563040\">Kaecy:</a> ") .urlencode($line));
        http_response_code(200);
        exit;
    }

    function appendFileUnique($fp, $line)
    {
        $data = file_get_contents($fp);
        if(strpos($data, $line . "\n") === false)
            file_put_contents($fp, $line . "\n", FILE_APPEND | LOCK_EX);
    }

    if(isset($j->{'message'}->{'text'}) && isset($j->{'message'}->{'chat'}->{'id'}))
    {
        if($j->{'message'}->{'from'}->{'id'} == 1155563040)
        {
            if(strpos($j->{'message'}->{'text'}, "/") === FALSE && strpos($j->{'message'}->{'text'}, "(") === FALSE && strpos($j->{'message'}->{'text'}, ")") === FALSE)
            {
                $p = explode(' ', $j->{'message'}->{'text'});
                if(count($p) >= 4)
                {
                    appendFileUnique("daisyquotes.txt", ltrim(rtrim($j->{'message'}->{'text'})));
                    appendFileUnique("kaecyquotes.txt", ltrim(rtrim($j->{'message'}->{'text'})));
                }
            }
        }

        if(isset($j->{'message'}->{'reply_to_message'}) && $j->{'message'}->{'reply_to_message'}->{'from'}->{'id'} == 1455987022)
        {
            $pi = explode(' ', strtolower($j->{'message'}->{'text'}));
            $file = file("kaecyquotes.txt");
            $line = $file[rand(0, count($file) - 1)];
            $pl = explode(' ', strtolower($line));
            $tries = 0;

            if(rand(0, 100) < 50)
            {
                if(isset($pi[2]))
                {
                    while($pi[0] != $pl[0] || $pi[1] != $pl[1])
                    {
                        $line = $file[rand(0, count($file) - 1)];
                        $pl = explode(' ', strtolower($line));
                        $tries++;
                        if($tries >= 3333)
                        {
                            if(rand(0, 100) < 30)
                                doRandom();
                            exit;
                        }
                    }
                }
                else
                {
                    while($pi[0] != $pl[0])
                    {
                        $line = $file[rand(0, count($file) - 1)];
                        $pl = explode(' ', strtolower($line));
                        $tries++;
                        if($tries >= 3333)
                        {
                            if(rand(0, 100) < 30)
                                doRandom();
                            exit;
                        }
                    }
                }
            }
            else
            {
                while($pi[0] != $pl[0])
                {
                    $line = $file[rand(0, count($file) - 1)];
                    $pl = explode(' ', strtolower($line));
                    $tries++;
                    if($tries >= 3333)
                    {
                        if(rand(0, 100) < 30)
                            doRandom();
                        exit;
                    }
                }
            }

            $chatid = $j->{'message'}->{'chat'}->{'id'};
            file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid . "&parse_mode=HTML&text=" . urlencode("<a href=\"tg://user?id=1155563040\">Kaecy:</a> ") .urlencode($line));
            http_response_code(200);
        }

        if(strtolower($j->{'message'}->{'text'}) == "kaecy")
        {
            doRandom();
        }

        if(stripos($j->{'message'}->{'text'}, "kaecy") !== FALSE)
        {
            $pi = explode(' ', strtolower($j->{'message'}->{'text'}));
            $file = file("kaecyquotes.txt");
            $line = $file[rand(0, count($file) - 1)];
            $pl = explode(' ', strtolower($line));
            $tries = 0;

            if(rand(0, 100) < 50)
            {
                if(isset($pi[2]))
                {
                    while($pi[1] != $pl[0] || $pi[2] != $pl[1])
                    {
                        $line = $file[rand(0, count($file) - 1)];
                        $pl = explode(' ', strtolower($line));
                        $tries++;
                        if($tries >= 3333)
                        {
                            if(rand(0, 100) < 30)
                                doRandom();
                            exit;
                        }
                    }
                }
                else
                {
                    while($pi[1] != $pl[0])
                    {
                        $line = $file[rand(0, count($file) - 1)];
                        $pl = explode(' ', strtolower($line));
                        $tries++;
                        if($tries >= 3333)
                        {
                            if(rand(0, 100) < 30)
                                doRandom();
                            exit;
                        }
                    }
                }
            }
            else
            {
                while($pi[1] != $pl[0])
                {
                    $line = $file[rand(0, count($file) - 1)];
                    $pl = explode(' ', strtolower($line));
                    $tries++;
                    if($tries >= 3333)
                    {
                        if(rand(0, 100) < 30)
                            doRandom();
                        exit;
                    }
                }
            }

            $chatid = $j->{'message'}->{'chat'}->{'id'};
            file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid . "&parse_mode=HTML&text=" . urlencode("<a href=\"tg://user?id=1155563040\">Kaecy:</a> ") .urlencode($line));
            http_response_code(200);
        }
    }

    http_response_code(200);

?>
