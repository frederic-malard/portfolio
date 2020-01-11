$(function(){
    $terrain = $("#terrain"); // table
    $difficulte = $("#difficulte"); // select
    //$taille = $("#taille"); // select
    $new = $("#new");
    $gameOver = false;
    $win = false;

    /*
        notes perso difficulté : facile = 1/8 10*10, moyen = 1/6 20*20, difficile = 1/4 30*30
    */

    $frequenceBombes = 8; // valeur par défaut avant que joueur ait sélectionné de difficulté. Correspond a "facile". Note : ce n'est pas une fréquence mais son inverse. 8 => 1/8 (une case sur 8 contient une bombe).
    $taille = 10; // nombre de cases de côté du terrain par défaut. 10*10, correspond à "facile".
    $nbCasesSafes = $taille**2;
    $nbCasesCheckées = 0;

    $gameOverFunc = function(td)
    {
        $terrain.before("<p style=\"text-align : center; color : red;\" id=\"gameOverP\">GAME OVER</p>");
        $gameOver = true;
    };

    $checkVoisins = function($line, $col)
    {
        $cpt = 0;
        for ($i=$line-1 ; $i<=($line+1) ; $i++)
        {
            if ($i>0 && $i<=$taille)
            {
                for ($j=$col-1 ; $j<=($col+1) ; $j++)
                {
                    if ($j>0 && $j<=$taille)
                    {
                        $case2 = $("#td_" + $i + "_" + $j);
                        if ($case2.hasClass("bombe"))
                        {
                            $cpt++;
                        }
                    }
                }
            }
        }
        return $cpt;
    };

    $goingX = function($sens, td, $k, $col)
    {
        $keepGoingCol = true;
        $l = $col;
        if ($sens == "left")
            $limiteCondX = $l>0;
        else
            $limiteCondX = $l<=$taille;
        while ($keepGoingCol && $limiteCondX)
        {
            $case = $("#td_" + $k + "_" + $l);
            if ($(td) != $case)
            {
                if(! $case.hasClass("safe"))
                    $nbCasesCheckées++;
                $case.css("background", "white");
                $case.removeClass("nothing").removeClass("flag").removeClass("interrogation").addClass("safe");
                if ($checkVoisins($k, $l) == 0)
                    $case.text("");
                else
                {
                    $case.text($checkVoisins($k, $l));
                    $keepGoingCol = false;
                }
            }
            if ($sens == "left")
            {
                $limiteCondX = $l>0;
                $l--;
            }
            else
            {
                $limiteCondX = $l<=$taille;
                $l++;
            }
        }
    };

    $goingY = function($sens, td, $line, $col)
    {
        $keepGoingLine = true;
        $k = $line;
        console.log($sens);
        if ($sens == "up")
            $limiteCond = $k>0;
        else
            $limiteCond = $k<=$taille;
        while ($keepGoingLine && $limiteCond)
        {
            $case = $("#td_" + $k + "_" + $col);
            if ($case.hasClass("bombe"))
            {
                keepGoingLine = false;
            }
            else if ($checkVoisins($k, $col) != 0)
            {
                if(! $case.hasClass("safe"))
                    $nbCasesCheckées++;
                $case.css("background", "white");
                $case.removeClass("nothing").removeClass("flag").removeClass("interrogation").addClass("safe");
                $case.text($checkVoisins($k, $col));
                $keepGoingLine = false;
            }
            else
            {
                $goingX("left", td, $k, $col);
                $goingX("right", td, $k, $col);
            }
            if($sens == "up")
            {
                $k--;
                $limiteCond = $k>0;
            }
            else
            {
                $k++;
                $limiteCond = $k<=$taille;
            }
        }
    };

    $caseSafe = function(td)
    {
        td.css("background", "white");
        td.removeClass("nothing").removeClass("flag").removeClass("interrogation").addClass("safe");
        td.text("");
        $nbCasesCheckées++;

        $id = $(td).attr("id");
        $first_ = $id.indexOf("_");
        $last_ = $id.lastIndexOf("_");
        $line = parseInt($id.substring($first_ + 1, $last_));
        $col = parseInt($id.substring($last_ + 1, $id.length));

        $cpt = $checkVoisins($line, $col);

        if ($cpt > 0)
        {
            td.text($cpt);
        }
        else
        {
            $goingY("up", td, $line, $col);
            $goingY("down", td, $line, $col);
        }
        console.log("check : " + $nbCasesCheckées + " ; safes : " + $nbCasesSafes);
        //if ($nbCasesCheckées == $nbCasesSafes)
        if ($verifGagne())
        {
            $terrain.before("<p style=\"text-align : center; color : red;\" id=\"gagneP\">GAGNÉ !!!</p>");
            $win = true;
        }
    };

    $rightClick = function(td/*, e*/)
    {
        //e.preventDefault();
        if (td.hasClass("nothing"))
        {
            td.removeClass("nothing").addClass("flag");
            td.css("background", "red");
        }
        else if (td.hasClass("flag"))
        {
            td.removeClass("flag").addClass("interrogation");
            td.css("background", "#bbb");
            td.text("?");
        }
        else if (td.hasClass("interrogation"))
        {
            td.removeClass("interrogation").addClass("nothing");
            td.text("");
        }
    };

    $onMouseDown = function(e)
    {
        if (! $gameOver && ! $win && ! $(this).hasClass("safe"))
        {
            e.preventDefault();
            switch(e.which)
            {
                case 1 :
                    if ($(this).hasClass("bombe"))
                        $gameOverFunc($(this));
                    else
                        $caseSafe($(this));
                    break;
                case 3 :
                    $rightClick($(this));
                    break;
            }
        }
    };

    $initialise = function()
    {
        if ($taille == 10)
            $("body").css("min-width", "340px");
        else if ($taille == 20)
            $("body").css("min-width", "640px");
        else
            $("body").css("min-width", "940px");
        if($("#gagneP").length != 0)
        {
            $("#gagneP").remove();
        }
        if($("#gameOverP").length != 0)
        {
            $("#gameOverP").remove();
        }
        $win = false;
        $gameOver = false;

        console.log($taille + " " + $frequenceBombes);
        $terrain.empty();
        //$("terrain").width(($taille*25) + "px");
        $("#terrain").css("margin", "auto");
        $("#terrain").css("margin-top", "20px");
        for($i=1 ; $i<=$taille ; $i++)
        {
            $tr = jQuery("<tr></tr>");
            $tr.attr("id", "tr_" + $i);
            $terrain.append($tr);
            for($j=1 ; $j<=$taille ; $j++)
            {
                $td = jQuery("<td></td>");
                $td.attr("id", "td_" + $i + "_" + $j);
                $td.addClass("nothing"); // case non cliquée, sans drapeau ni rien
                $td.attr("text-align", "center");
                $td.attr("width", "30px");
                $td.attr("height", "30px");
                $td.css("color", "black");
                $td.css("background", "#ddd");
                $td.css("border", "1px solid black");
                $td.css("text-align", "center");
                $tr.append($td);
                $random = Math.floor(Math.random() * $frequenceBombes + 1);
                if ($random == $frequenceBombes)
                {
                    $td.addClass("bombe");
                    $nbCasesSafes--;
                }
                $td.mousedown($onMouseDown);
                //$td.bind("taphold", $rightClick($td));
            }
        }
        return false; // apparemment empêche de recharger la page
    }

    $verifGagne = function()
    {
        $gagne = true;
        for ($m=1 ; $m<=$taille ; $m++)
        {
            for ($n=1 ; $n<=$taille ; $n++)
            {
                $laCase = $("#td_" + $m + "_" + $n);
                if(! $laCase.hasClass("bombe") && ! $laCase.hasClass("safe"))
                {
                    $gagne = false;
                    break;
                }
            }
            if (! $gagne)
                break;
        }
        return $gagne;
    };

    $difficulte.change(function(e)
    {
        $val = "";
        $("select option:selected").each(function(){
            $val = this.text;
        });
        switch($val)
        {
            case "facile" :
                $taille = 10;
                $frequenceBombes = 8;
                console.log($taille + " " + $frequenceBombes);
                break;
            case "moyen" :
                $taille = 20;
                $frequenceBombes = 6;
                console.log($taille + " " + $frequenceBombes);
                break;
            case "difficile" :
                $taille = 30;
                $frequenceBombes = 4;
                console.log($taille + " " + $frequenceBombes);
                break;
            default :
                console.log("difficulte change : default");
        }
    });

    $new.click($initialise);

    $initialise();

});