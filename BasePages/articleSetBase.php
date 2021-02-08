<div class="row">
  <h1 style="color:#FFFFFF" class="text-center"> <?php echo $title ?> </h1>
</div>

<div class="row">
  <?php
    $contentFiles = scandir($contentFolder);

    $leftCol = (object) ["height" => 0, "htmlString" => ""];
    $centerCol = (object) ["height" => 0, "htmlString" => ""];
    $rightCol = (object) ["height" => 0, "htmlString" => ""];

    foreach ($contentFiles as $file)
    {
      if (strlen($file) < 3) continue;

      $jsonFile = fopen($contentFolder . "/" . $file, "r");
      $json_string = fread($jsonFile, filesize($contentFolder . "/" . $file));
      $json_object = json_decode($json_string);

      $imageURL = "";
      foreach ($json_object->contents as $element)
      {
        if ($element->type == "image")
        {
          $imageURL = $element->content;
          break;
        }
      }

      // Get height of image
      list($width, $height) = getimagesize($imageURL);
      $heightRatio = $height/$width;

      // Add to shortest array
      if ($leftCol->height <= $centerCol->height)
      {
        if ($leftCol->height <= $rightCol->height)
        {
          // add to left column
          $leftCol->htmlString = $leftCol->htmlString . CreateSummaryCard($contentFolder . "/" . $file);
          $leftCol->height += $heightRatio;
        }
        else
        {
          // add to right column
          $rightCol->htmlString = $rightCol->htmlString . CreateSummaryCard($contentFolder . "/" . $file);
          $rightCol->height += $heightRatio;
        }
      }
      else
      {
        if ($centerCol->height <= $rightCol->height)
        {
          // add to center column
          $centerCol->htmlString = $centerCol->htmlString . CreateSummaryCard($contentFolder . "/" . $file);
          $centerCol->height += $heightRatio;
        }
        else
        {
          // add to right column
          $rightCol->htmlString = $rightCol->htmlString . CreateSummaryCard($contentFolder . "/" . $file);
          $rightCol->height += $heightRatio;
        }
      }
    }

    $htmlString = "<div class=\"col-4\">" .
                    $leftCol->htmlString .
                  "</div>" .
                  "<div class=\"col-4\">" .
                    $centerCol->htmlString .
                  "</div>" .
                  "<div class=\"col-4\">" .
                    $rightCol->htmlString .
                  "</div>";
    echo $htmlString;
  ?>
</div>
