<?php

function CreateSummaryCard($contentFile)
{
  $file = fopen($contentFile, "r");
  $json_string = fread($file, filesize($contentFile));
  $json_object = json_decode($json_string);

  $imageURL = "";
  $title = "";

  foreach ($json_object->contents as $element)
  {
    if ($element->type == "image" && $imageURL == "") $imageURL = $element->content;
    if ($element->type == "title" && $title == "") $title = $element->content;
  }

  $result = "<br><a href=\"article.php?item=" . $contentFile . "\" style=\"text-decoration:none\">" .
              "<div class=\"card\" style=\"background-color: " . GetColor($json_object->type) . "\">" .
                "<img class=\"card-img-top\" src=\"" . $imageURL . "\" alt=\"Image could not load\">" .
                "<div class=\"card-body\">" .
                  "<h5 class=\"card-title text-center\" style=\"color:#000000\">" . $title . "</h5>" .
                "</div>" .
              "</div>" .
            "</a>";

  return $result;
}

function GetColor($type)
{
  if ($type == "prototype")
    return "#660000";
  else if ($type == "vfx")
    return "#005500";
  else if ($type == "art")
    return "#885500";
}

function CreateLinkCard($page, $type)
{
  $result = "<br><a href=\"" . $page . "\" style=\"text-decoration:none\">" .
              "<div class=\"card\" style=\"background-color: " . GetColor($type) . "\">" .
                "<img class=\"card-img-top\" src=\"Images/more.png\" alt=\"Image could not load\">" .
                "<div class=\"card-body\">" .
                  "<h5 class=\"card-title text-center\" style=\"color:#000000\">See more...</h5>" .
                "</div>" .
              "</div>" .
            "</a>";

  return $result;
}

?>
