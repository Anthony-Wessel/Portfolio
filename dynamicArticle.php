<?php

function CreateArticle($contentFile)
{
  $file = fopen($contentFile, "r");
  $json_string = fread($file, filesize($contentFile));
  $json_object = json_decode($json_string);

  $result = "<br>";
  foreach ($json_object->contents as $element)
  {
    $result = $result . ParseElement($element);
  }

  return $result;
}


function ParseElement($element)
{
  $type = $element->type;
  $content = $element->content;

  if ($type == "title") return CreateTitle($content);
  else if ($type == "header") return CreateHeader($content);
  else if ($type == "paragraph") return CreateParagraph($content);
  else if ($type == "image") return CreateImage($content);
  else if ($type == "game") return CreateGame($content);
}


function CreateTitle($text)
{
  return "<h1 class=\"text-center\" style=\"color: #FFFFFF\">" . $text . "</h1> <br>";
}

function CreateHeader($text)
{
  return "<h3 class=\"text-center\" style=\"color: #EEEEEE\">" . $text . "</h3> <br>";
}

function CreateParagraph($text)
{
  return "<p class=\"text-center\" style=\"color: #CCCCCC\">" . $text . "</p> <br>";
}

function CreateImage($imgURL)
{
  return "<div class=\"text-center\">" .
            "<img src= \"".$imgURL."\" alt=\"Image could not load\" width=\"80%\">" .
         "</div>" .
         "<br>";
}

function CreateGame($gameURL)
{
  return "<div class = \"ms-auto me-auto\" style= \"width:64vw; height:36vw\">" .
              "<iframe src=\"" . $gameURL . "\" style=\"border:0px #000000 none\" " .
                  "name=\"Game name\" scrolling=\"no\" frameborder=\"1\" " .
                  "marginheight=\"100px\" marginwidth=\"320px\" " .
                  "width=\"100%\" height=\"100%\">" .
              "</iframe>" .
          "</div>" .
          "<br>";
}

?>
